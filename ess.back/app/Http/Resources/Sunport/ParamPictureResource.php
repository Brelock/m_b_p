<?php

namespace App\Http\Resources\Sunport;

use App\Models\SunportParamPicture;
use Illuminate\Http\Resources\Json\JsonResource;

class ParamPictureResource extends JsonResource {
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request $request
   * @return array
   */
  public function toArray($request) {
    /* @var SunportParamPicture|self $this */
    return [
      'id' => $this->id,
      'sunport_id' => $this->sunport_id,

      'title' => tAttr($this, 'title_{lang}'),
      'title_uk' => $this->title_uk,
      'title_ru' => $this->title_ru,

      'picture_file_name' => $this->picture_file_name,

      'full_link' => $this->assetAbsolute($this->picture_file_name),
    ];
  }
}
