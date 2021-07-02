<?php

namespace App\Http\Resources;

use App\Http\Resources\Helpers\LazyEagerRelationsLoading;
use App\Http\Resources\Sunport\ParamPictureResource;
use App\Http\Resources\Sunport\ParamResource;
use App\Models\Sunport;


class SunportResource extends JsonResource {
	use LazyEagerRelationsLoading;

  /**
   * @param \Illuminate\Http\Request $request
   * @return array
   */
	public function toArray($request) {
		/* @var Sunport|self $this */
		return [
			'id' => $this->id,
			'alias' => $this->alias,

			'title' => tAttr($this, 'title_{lang}'),
			'title_uk' => $this->title_uk,
      'title_ru' => $this->title_ru,

      'price' => $this->price,

      'xls_file_name' => $this->xls_file_name,

      'sub_title' => tAttr($this, 'sub_title_{lang}'),
      'sub_title_uk' => $this->sub_title_uk,
      'sub_title_ru' => $this->sub_title_ru,

			'seo_title' => tAttr($this, 'seo_title_{lang}'),
			'seo_title_uk' => $this->seo_title_uk,
			'seo_title_ru' => $this->seo_title_ru,

      'display_order' => $this->display_order,

      'xls_file_path' => $this->assetAbsolute(($this->xls_file_name ?: '')),
      'picture_file_path' => $this->assetAbsolute(($this->picture_file_name ?: '')),

      'params' => $this->whenLoaded('params') ? ParamResource::collection($this->whenLoaded('params')) : null,
      'paramsPicture' => $this->whenLoaded('paramsPicture') ? ParamPictureResource::collection($this->whenLoaded('paramsPicture')) : null,
		];
  }

  /**
   * @return array
   */
  public function relations(): array {
  	//
  }
}