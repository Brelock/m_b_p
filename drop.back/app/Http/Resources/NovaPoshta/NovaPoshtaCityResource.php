<?php

namespace App\Http\Resources\NovaPoshta;

use App\Http\Resources\JsonResource;
use App\Models\NovaPoshtaCity;

class NovaPoshtaCityResource extends JsonResource {
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request $request
   * @return array
   */
  public function toArray($request) {
    /* @var NovaPoshtaCity|self $this */
    return $this->resource->toArray($request);
  }
}
