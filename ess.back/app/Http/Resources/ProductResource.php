<?php

namespace App\Http\Resources;

use App\Http\Resources\Helpers\LazyEagerRelationsLoading;
use App\Http\Resources\Product\ParamResource;
use App\Http\Resources\Product\PictureResource;
use App\Models\Product;

class ProductResource extends JsonResource {
	use LazyEagerRelationsLoading;

  /**
   * @param \Illuminate\Http\Request $request
   * @return array
   */
	public function toArray($request) {
		/* @var Product|self $this */
		return [
			'id' => $this->id,
			'alias' => $this->alias,

			'title' => tAttr($this, 'title_{lang}'),
			'title_uk' => $this->title_uk,
      'title_ru' => $this->title_ru,

      'price' => $this->price,

      'xls_file_name' => $this->xls_file_name,

      'sub_description' => tAttr($this, 'sub_description_{lang}'),
      'sub_description_uk' => $this->sub_description_uk,
      'sub_description_ru' => $this->sub_description_ru,

//      'is_kness' => $this->is_kness,

			'seo_title' => tAttr($this, 'seo_title_{lang}'),
			'seo_title_uk' => $this->seo_title_uk,
			'seo_title_ru' => $this->seo_title_ru,

			'seo_description' => tAttr($this, 'seo_description_{lang}'),
			'seo_description_uk' => $this->seo_description_uk,
			'seo_description_ru' => $this->seo_description_ru,

      'display_order' => $this->display_order,

      'xls_file_path' => $this->assetAbsolute(($this->xls_file_name ?: '')),

      'params' => $this->whenLoaded('params') ? ParamResource::collection($this->whenLoaded('params')) : null,
      'pictures' =>$this->whenLoaded('pictures') ?  PictureResource::collection($this->whenLoaded('pictures')) : null,
		];
  }

  /**
   * @return array
   */
  public function relations(): array {
  	//
  }
}