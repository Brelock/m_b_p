<?php

namespace App\Http\Resources;

use App\Http\Resources\Helpers\LazyEagerRelationsLoading;
use App\Http\Resources\Product\PictureResource;
use App\Models\Product;
use App\Models\ProductPicture;
use App\Http\Resources\Product\ParamResource;

class ProductResource extends JsonResource {
	use LazyEagerRelationsLoading;

  /**
   * @param \Illuminate\Http\Request $request
   * @return array
   */
	public function toArray($request) {
		/* @var Product|self $this */
		return array_merge(
			[
				'id' => $this->id,
				'external_id' => $this->external_id,
				'available' => $this->available,
				'art' => $this->art,
				'name' => $this->name,
				'price' => $this->price,
				'price_old' => $this->price_old,
				'old_price_drop' => $this->old_price_drop,
				'discount_drop' => $this->discount_drop,
				'old_price_opt' => $this->old_price_opt,
				'discount_opt' => $this->discount_opt,
				'stock_quantity' => $this->stock_quantity,
				'category_id' => $this->category_id,
				'description' => $this->description,
				'vendor' => $this->vendor,

        'pictures' => PictureResource::collection($this->whenLoaded('pictures')),
        'params' => ParamResource::collection($this->whenLoaded('productParams')),
        'category' => new CategoryResource($this->whenLoaded('category')),

        'isSale' => $this->isSale(),
        'isDiscount' => $this->isDiscount(),
        'isNew' => $this->isNew(),

        'route' => route('products.show', ['product' => $this]),
        'routeDownloadPictures' => route('download.zip', ['product' => $this]),
        'routeAddToCart' => route('products.order', ['product' => $this]),
			], $this->loadRelations($request)
    );
  }

  /**
   * @return array
   */
  public function relations(): array {
    $retrieveBackgroundPicture = function(string $attribute, string $defaultAttribute = null) {
      return function() use($attribute, $defaultAttribute) {
        /* @var Product|self $this */
        if ($this->pictures->isNotEmpty()) {
          /* @var Product|self $this */
          $picture = $this->pictures->first();

          /* @var ProductPicture $picture */
          $originalFileName = $picture->getAttributeValue($attribute);
          $defaultFileName = $defaultAttribute ? $picture->getAttributeValue($defaultAttribute) : '';

          if($originalFileName && $picture->fileExists($originalFileName))
            return $picture->assetAbsolute($originalFileName);
          else if($defaultAttribute && $picture->fileExists($defaultFileName))
            return $picture->assetAbsolute($defaultFileName);
        }

        return null;
      };
    };

    return [
      'backgroundPicture' => [
        'dependencyRelation' => 'pictures',
        'load' => $retrieveBackgroundPicture('file_name'),
      ],
	    'backgroundThumbnail' => [
		    'dependencyRelation' => 'pictures',
		    'load' => $retrieveBackgroundPicture('thumbnail_name', 'file_name'),
	    ],
    ];
  }
}