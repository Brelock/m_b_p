<?php

namespace App\Import\Seeder;

use App\Collection\CategoryCollection;
use App\Collection\ParamCollection;
use App\Collection\ParamValueCollection;
use App\Collection\ProductCollection;
use App\Criteria\Base\SoftDeleted\WithTrashed;
use App\Criteria\Builder\CriteriaCollection;
use App\Criteria\Param\WhereTitles;
use App\Criteria\ParamValue\WhereParams;
use App\Criteria\ParamValue\WhereValues;
use App\Criteria\Product\WhereExternalIDs;
use App\Criteria\Product\WithDefaultRelationship;
use App\Enums\DirectoriesStorage;
use App\Import\Collection\OfferCollection;
use App\Import\Collection\OfferParamCollection;
use App\Import\Collection\UploadedOfferPictureCollection;
use App\Import\Entity\Offer;
use App\Jobs\UploadOfferPictures;
use App\Models\Category;
use App\Models\Param;
use App\Models\ParamValue;
use App\Models\Product;
use App\Models\ProductParam;
use App\Services\CategoryService;
use App\Services\ProductService;
use Carbon\Carbon;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Arr;

class ProductSeeder {
  /**
   * @var OfferCollection
   */
  protected $offerEntityCollection;

  /**
   * @var CategoryCollection
   */
  protected $categoryModelCollection;

  /**
   * @var ParamCollection
   */
  private $params;

  /**
   * @var ParamValueCollection
   */
  private $paramValues;

  /**
   * @var Category[]|array
   */
  private $_categories = [];

  /**
   * @var array
   */
  private $_categoriesParams = [];

	/**
	 * ProductSeeder constructor.
	 *
	 * @param OfferCollection $offerEntityCollection
	 * @param CategoryCollection $categoryModelCollection
	 */
  public function __construct(OfferCollection $offerEntityCollection, CategoryCollection $categoryModelCollection) {
    $this->offerEntityCollection = $offerEntityCollection->keyById();
    $this->categoryModelCollection = $categoryModelCollection;

    $this->params = new ParamCollection();
    $this->paramValues = new ParamVAlueCollection();
  }

  /**
   * Set all properties to null.
   */
  private function clear() {
    $this->params = new ParamCollection();
    $this->paramValues = new ParamValueCollection();
    $this->_categories = [];
    $this->_categoriesParams = [];
  }

  /**
   * Fetch products from database by external_id from OfferCollection.
   *
   * @return ProductCollection
   */
  protected function fetchExistModels(): ProductCollection {
    /* @var ProductCollection $products */
    $products = Product::fetchAll(
      new CriteriaCollection(
        [
          new WithDefaultRelationship(),
          new WhereExternalIDs($this->offerEntityCollection->ids()),
					new WithTrashed(),
        ]
      )
    );

    return $products->keyByExternalId();
  }

  /**
   * @param string $externalCategoryId
   * @return Category|null
   */
  protected function findCategoryModel(string $externalCategoryId): ?Category {
    return $this->categoryModelCollection->findByExternalId($externalCategoryId);
  }

  /**
   * @param OfferParamCollection $collection
   * @return ParamCollection
   */
  protected function fetchParamsModels(OfferParamCollection $collection): ParamCollection {
    /* @var ParamCollection $params */
    if (!$this->params->hasAllTitles($collection)) {
      $this->params = $this->params->merge(
        Param::fetchAll(
          new CriteriaCollection(
            [
              new WhereTitles($collection->getTitles()),
            ]
          )
        )
      );
    }

    return $this->params;
  }

	/**
	 * @param Product $product
	 * @param Offer $offer
	 * @param $importTime
	 *
	 * @return Product
	 */
  protected function saveProduct(Product $product, Offer $offer, $importTime): Product {
    $service = new ProductService($product);

    $category = $this->findCategoryModel($offer->getCategoryId());

    $offerParamsCollection = $offer->getParams();

    $attachedRealParams = $this
      ->fetchParamsModels($offerParamsCollection)
      ->syncWithOfferParams($offerParamsCollection)
      ->onlyByOfferParams($offerParamsCollection);

//		загружаем значение параметров по связи. те что уже есть в бд
	  $attachedRealParams->load(
	  	[
	  		'paramValues' => function($query) use($offerParamsCollection) {
	  		  /* @var Builder $query */
				  return $query->whereIn('value', $offerParamsCollection->getValues());
			  }
		  ]
	  );

//	  получение всех значений всех параметров из бд
	  $paramValues = $attachedRealParams->unionValues();

//	  добавляем значения параметров из xml
	  $paramValues = $paramValues->merge(
		  $attachedRealParams->attachValues($offerParamsCollection->diff($paramValues->pluck('value')))
	  );

//	  получаем связку "{$value->param_id}|{$value->id}";
	  $paramValues = $paramValues->keyByParamWithSelfId();


    $service
      ->copyFromOffer($offer)
	    ->calculateDiscountDrop($offer->getOldPriceDrop(), $offer->getPriceOld())
	    ->calculateDiscountOpt($offer->getOldPriceOpt(), $offer->getPrice())
      ->attachOrDetachCategory($category)
      ->attachParams($paramValues);

		$service
			->setImportTime($importTime)
			->restoreProduct()
			->commitChanges();

    UploadOfferPictures::dispatch($product, $offer);

    if ($category)
      $this->pushParamsToCategory($category, $attachedRealParams);

    return $service->getProduct();
  }

  /**
   * @param Category $category
   * @param ParamCollection $params
   */
  protected function pushParamsToCategory(Category $category, ParamCollection $params): void {
    $this->_categories[$category->id] = $category;

    $this->_categoriesParams[$category->id] = array_merge(
      Arr::wrap(Arr::get($this->_categoriesParams, $category->id, [])),
      $params->getIds()
    );
  }

  /**
   * Sync params in category for each product.
   */
  protected function syncParamsWithCategories(): void {
    foreach ($this->_categories as $category) {
      $service = new CategoryService($category);
      $service
        ->attachParams(Arr::wrap(Arr::get($this->_categoriesParams, $category->id, [])))
        ->commitChanges();
    }
  }

  /**
   * @return ProductCollection
   */
  public function run(): ProductCollection {
  	$timestamp = Carbon::now();
//  	get products where offers->id == $product->external_id
    $products = $this->fetchExistModels();

    $products = $products->map(function ($product) use($timestamp) {
      /* @var Product $product */

      $offer = $this->offerEntityCollection->get($product->external_id);
      if ($offer)
        $product = $this->saveProduct($product, $offer, $timestamp);

      return $product;
    });

    $offers = $this->offerEntityCollection->diffKeys($products->all());

    foreach ($offers as $offer)
      $products->push($this->saveProduct(new Product(), $offer, $timestamp));

    $this->syncParamsWithCategories();

    $this->clear();

    $productsToDelete = Product::query()
	    ->where('import_time', "!=", $timestamp)
	    ->get();
	  $productsToDelete->each(function($productToDelete) {
	  	/* @var Product $productToDelete */
		  $productToDelete->delete();
	  });
    return $products;
  }
}