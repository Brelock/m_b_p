<?php

namespace App\Http\Resources;

use App\Models\Solution;

class SolutionResource extends JsonResource {
  /**
   * Transform the resource into an array.
   *
   * @param \Illuminate\Http\Request $request
   * @return array
   */
  public function toArray($request) {
    /* @var Solution|self $this */
    return
      [
        'id' => $this->id,
        'alias' => $this->alias,
        'type' => $this->type,

        'title' => tAttr($this, 'title_{lang}'),
        'title_uk' => $this->title_uk,
        'title_ru' => $this->title_ru,

        'power' => $this->power,

        'picture_file_name' => $this->picture_file_name,
        'solution_url' => $this->solution_url,

        'display_order' => $this->display_order,
        'backgroundPicture' => isset($this->picture_file_name) ? $this->assetAbsolute($this->picture_file_name) : ''

      ];
  }
}
