<?php

namespace App\Http\Resources\Product;

use App\Models\ProductParam;
use Illuminate\Http\Resources\Json\JsonResource;

class ParamResource extends JsonResource {
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request $request
   * @return array
   */
  public function toArray($request) {
    /* @var ProductParam|self $this */
    return [
      'id' => $this->id,
      'product_id' => $this->product_id,

      'title' => tAttr($this, 'title_{lang}'),
      'title_uk' => $this->title_uk,
      'title_ru' => $this->title_ru,

      'value' => tAttr($this, 'value_{lang}'),
      'value_uk' => $this->value_uk,
      'value_ru' => $this->value_ru,
    ];
  }
}
