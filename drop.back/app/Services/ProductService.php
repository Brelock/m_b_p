<?php

namespace App\Services;

use App\Collection\ParamValueCollection;
use App\DTO\ProductDto;
use App\Import\Collection\OfferPictureCollection;
use App\Import\Collection\UploadedOfferPictureCollection;
use App\Import\Entity\Offer;
use App\Models\Category;
use App\Models\ProductParam;
use App\Models\ProductPicture;
use App\Models\Product;
use App\Services\Helpers\PromiseActionsTrait;

class ProductService {
	use PromiseActionsTrait;

	/**
	 * @var Product
	 */
	private $product;

	/**
	 * ProductItemService constructor.
	 *
	 * @param Product $product
	 */
	public function __construct(Product $product) {
		$this->product = $product;
	}

	/**
	 * @return Product
	 */
	public function getProduct(): Product {
		return $this->product;
	}

	/**
	 * @param ProductDto $productDto
	 * @return $this
	 */
	public function changeAttributes(ProductDto $productDto): self {
		$this->product->fill($productDto->toArray());
		return $this;
	}

  /**
   * @param Offer $offer
   * @return ProductService
   */
	public function copyFromOffer(Offer $offer) : self {
	  $this->product->fill($offer->toFillableProductAttributes());
	  return $this;
  }

	/**
	 * @param float $oldPriceDrop
	 * @param float $newPriceDrop
	 * @return $this
	 */
  public function calculateDiscountDrop(float $oldPriceDrop, float $newPriceDrop): self {
	  $this->product->discount_drop = $this->calculateDiscount($oldPriceDrop, $newPriceDrop);
		return $this;
  }

	/**
	 * @param float $oldPriceOpt
	 * @param float $newPriceOpt
	 * @return $this
	 */
  public function calculateDiscountOpt(float $oldPriceOpt, float $newPriceOpt): self {
  	$this->product->discount_opt = $this->calculateDiscount($oldPriceOpt, $newPriceOpt);
  	return $this;
  }

	/**
	 * @param float $oldPrice
	 * @param float $newPrice
	 * @return float
	 */
  public function calculateDiscount(float $oldPrice, float $newPrice) {
  	return $oldPrice ? round(($newPrice-$oldPrice)/$oldPrice * 100) : 0;
  }

  /**
   * @param Category|null $category
   * @return ProductService
   */
	public function attachOrDetachCategory(?Category $category) : self {
	  $this->product->category()->associate($category);
	  return $this;
  }

	/**
	 * @param ParamValueCollection $paramValues
	 * @return $this
	 */
	public function attachParams(ParamValueCollection $paramValues) : self {
		$this->recordPromiseAction(function () use ($paramValues) {

//	  получаем связку "{product_param->param_id}|{product_param->param_value_id}";
			$productValues = $this->product->productParams->keyByParamWithValueId();
//    сохраням в бд те productParam которых нет в БД

			$paramValues->diffKeys($productValues)
				->each(function($pv) {
					$this->product->productParams()->save(
						new ProductParam(
							[
								'param_id' => $pv->param_id,
								'param_value_id' => $pv->id
							]
						)
					);
				});
//		находим те productValues которые есть в бд на нет в xml
			$oldProductValues = $productValues->diffKeys($paramValues)->keyBy('id');
//		удаляем productParam которых нет в xml
			if($oldProductValues->isNotEmpty()) {
				ProductParam::query()
					->whereIn('id', $oldProductValues->keys()->all())
					->delete();
			}
		});

		return $this;
	}

  /**
   * @param  UploadedOfferPictureCollection|Offer\UploadedPicture[] $newPictures
   * @return ProductService
   */
  public function addPictures(UploadedOfferPictureCollection $newPictures) : self {
    $this->recordPromiseAction(function () use ($newPictures) {
      foreach ($newPictures as $picture) {
        $this->product
          ->pictures()
          ->save(new ProductPicture($picture->toArray()));
      }
    });

    return $this;
  }


  /**
   * @param  array $pictureIds
   * @return ProductService
   */
	public function deletePictures(array $pictureIds) : self {
	  if(empty($pictureIds))
	    return $this;

	  $this->recordPromiseAction(function() use($pictureIds) {
      $this->product
        ->pictures()
        ->whereIn('id', $pictureIds)
        ->each(function ($picture) {
          /* @var ProductPicture $picture */
          $picture->delete();
        });
    });

	  return $this;
	}

	/**
	 * @param OfferPictureCollection $allXmlPictures
	 * @return ProductService
	 */
	public function setOrderingPictures(OfferPictureCollection $allXmlPictures): self {
		if(empty($allXmlPictures))
			return $this;

		$this->recordPromiseAction(function () use ($allXmlPictures) {
			$this->product
				->pictures()
				->each(function ($picture) use($allXmlPictures) {
					/* @var ProductPicture $product */
					foreach($allXmlPictures as $xmlPicture) {
						/* @var Offer\Picture $xmlPicture */
						if($picture->file_name == $xmlPicture->getId(null, ".jpg")) {
							$picture->ordering = $xmlPicture->getOrdering();
							$picture->save();
						}
					}
				});
		});

		return $this;
	}

	/**
	 * @param $importTime
	 * @return ProductService
	 */
	public function setImportTime($importTime): self {
		$this->product->import_time = $importTime;

		return $this;
	}

	/**
	 * @return ProductService
	 */
	public function restoreProduct(): self {
		if($this->product->deleted_at)
			$this->product->deleted_at = NULL;

		return $this;
	}

	/**
	 * @return ProductService
	 */
	public function commitChanges(): self {
		$this->product->save();

		$this->releasePromiseActions();

		return $this;
	}
}
