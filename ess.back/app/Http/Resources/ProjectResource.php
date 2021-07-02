<?php

namespace App\Http\Resources;

use App\Http\Resources\Helpers\LazyEagerRelationsLoading;
use App\Http\Resources\Project\PictureResource;
use App\Models\Project;

class ProjectResource extends JsonResource {
	use LazyEagerRelationsLoading;

  /**
   * @param \Illuminate\Http\Request $request
   * @return array
   */
	public function toArray($request) {
		/* @var Project|self $this */
		return [
			'id' => $this->id,
			'alias' => $this->alias,

			'title' => tAttr($this, 'title_{lang}'),
			'title_uk' => $this->title_uk,
      'title_ru' => $this->title_ru,

			'address' => tAttr($this, 'address_{lang}'),
			'address_uk' => $this->address_uk,
			'address_ru' => $this->address_ru,

			'options' => tAttr($this, 'options_{lang}'),
			'options_uk' => $this->options_uk,
			'options_ru' => $this->options_ru,


			'exploitation' => tAttr($this, 'exploitation_{lang}'),
			'exploitation_uk' => $this->exploitation_uk,
			'exploitation_ru' => $this->exploitation_ru,

			'display_order' => $this->display_order,

			'seo_title' => tAttr($this, 'seo_title_{lang}'),
			'seo_title_uk' => $this->seo_title_uk,
			'seo_title_ru' => $this->seo_title_ru,

			'seo_description' => tAttr($this, 'seo_description_{lang}'),
			'seo_description_uk' => $this->seo_description_uk,
			'seo_description_ru' => $this->seo_description_ru,

      'pictures' => PictureResource::collection($this->whenLoaded('pictures')),
      'mainPicture' => new PictureResource($this->whenLoaded('mainPicture')),

      'routeShow' => route('projects.show', ['project' => $this]),
		];
  }

  /**
   * @return array
   */
  public function relations(): array {
  	//
  }
}