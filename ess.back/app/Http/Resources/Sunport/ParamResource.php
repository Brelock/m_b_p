<?php

namespace App\Http\Resources\Sunport;

use App\Models\SunportParam;
use Illuminate\Http\Resources\Json\JsonResource;

class ParamResource extends JsonResource {
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request $request
   * @return array
   */
  public function toArray($request) {
    /* @var SunportParam|self $this */
    return [
      'id' => $this->id,
      'sunport_id' => $this->sunport_id,

      'title' => tAttr($this, 'title_{lang}'),
      'title_uk' => $this->title_uk,
      'title_ru' => $this->title_ru,

      'value' => tAttr($this, 'value_{lang}'),
      'value_uk' => $this->value_uk,
      'value_ru' => $this->value_ru,
    ];
  }
}
