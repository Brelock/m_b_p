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
      'title' => $this->param->title,
      'value' => $this->paramValue->value,
    ];
  }
}
