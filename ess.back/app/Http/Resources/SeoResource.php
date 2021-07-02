<?php

namespace App\Http\Resources;

use App\Http\Resources\Helpers\LazyEagerRelationsLoading;
use App\Models\Seo;

class SeoResource extends JsonResource {
	use LazyEagerRelationsLoading;

  /**
   * @param \Illuminate\Http\Request $request
   * @return array
   */
	public function toArray($request) {
		/* @var Seo|self $this */
		return [
			'id' => $this->id,

			'redirect_uri' => $this->redirect_uri,

			'title_uk' => $this->title_uk,
			'title_ru' => $this->title_ru,
			'description_uk' => $this->description_uk,
			'description_ru' => $this->description_ru,

      'routeEdit' => route('admin.seo.edit', ['seo' => $this]),
      'routeDestroy' => route('admin.seo.destroy', ['seo' => $this]),
		];
  }

  /**
   * @return array
   */
  public function relations(): array {
  	//
  }
}