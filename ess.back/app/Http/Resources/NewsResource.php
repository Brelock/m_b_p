<?php

namespace App\Http\Resources;

use App\Http\Resources\Helpers\LazyEagerRelationsLoading;
use App\Http\Resources\News\PictureResource;
use App\Models\News;

class NewsResource extends JsonResource {
	use LazyEagerRelationsLoading;

  /**
   * @param \Illuminate\Http\Request $request
   * @return array
   */
	public function toArray($request) {
		/* @var News|self $this */
		return [
			'id' => $this->id,
			'alias' => $this->alias,

			'title' => tAttr($this, 'title_{lang}'),
			'title_uk' => $this->title_uk,
			'title_ru' => $this->title_ru,

			'text' => tAttr($this, 'text_{lang}'),
			'text_uk' => $this->text_uk,
			'text_ru' => $this->text_ru,

			'text_index' => $this->getTransformText(tAttr($this, 'text_{lang}')),


			'is_published' => $this->is_published,
			'publication_date' => $this->getFormattedDateAttribute('publication_date')->format('d.m.Y'),

			'pictures' => PictureResource::collection($this->whenLoaded('pictures')),
			'picture' => new PictureResource($this->whenLoaded('picture')),
			'mainPicture' => new PictureResource($this->whenLoaded('mainPicture')),

			'seo_title' => tAttr($this, 'seo_title_{lang}'),
			'seo_title_uk' => $this->seo_title_uk,
			'seo_title_ru' => $this->seo_title_ru,

			'seo_description' => tAttr($this, 'seo_description_{lang}'),
			'seo_description_uk' => $this->seo_description_uk,
			'seo_description_ru' => $this->seo_description_ru,

      'routeShow' => route('news.show', ['news' => $this]),
		];
  }

  /**
   * @return array
   */
  public function relations(): array {
  	//
  }
}