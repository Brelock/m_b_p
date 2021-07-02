<?php

namespace App\Http\Resources\NovaPoshta;

use App\Http\Resources\JsonResource;
use App\Models\NovaPoshtaWarehouse;

class NovaPoshtaWarehouseResource extends JsonResource {
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request $request
   * @return array
   */
  public function toArray($request) {
    /* @var NovaPoshtaWarehouse|self $this */
    return $this->resource->toArray($request);
  }
}
