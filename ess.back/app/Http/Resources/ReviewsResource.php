<?php

namespace App\Http\Resources;

use App\Models\Review;

class ReviewsResource extends JsonResource {
  /**
   * Transform the resource into an array.
   *
   * @param \Illuminate\Http\Request $request
   * @return array
   */
  public function toArray($request) {
    /* @var Review|self $this */
    return
      [
        'id' => $this->id,

        'title' => $this->title,
        'type' => $this->type,

        'text' => tAttr($this, 'text_{lang}'),
        'text_ru' => $this->text_ru,
        'text_uk' => $this->text_uk,

        'author_name' => tAttr($this, 'author_name_{lang}'),
        'author_name_ru' => $this->author_name_ru,
        'author_name_uk' => $this->author_name_uk,

        'work_url' => $this->work_url,
        'video_url' => $this->video_url,
        'video_id' => preg_match("/youtube\.\w+.*?v[=]([a-zA-Z0-9-_]+)/", $this->video_url, $matches) ? $matches[1] : '',

        'picture_file_name' => $this->picture_file_name,

        'display_order' => $this->display_order,
        'backgroundPicture' => isset($this->picture_file_name) ? $this->assetAbsolute($this->picture_file_name) : ''
      ];
  }
}
