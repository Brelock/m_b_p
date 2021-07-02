<?php

namespace App\Http\Resources;

use App\Http\Resources\JsonResource;
use App\Models\Category;

class CategoryResource extends JsonResource {
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request $request
   * @return array
   */
  public function toArray($request) {
    /* @var Category|self $this */
    return [
      'id' => $this->id,
      'parent_id' => $this->parent_id,
      'name' => $this->name,
      'parent' =>  new CategoryResource($this->whenLoaded('parent'))
    ];
  }
}
