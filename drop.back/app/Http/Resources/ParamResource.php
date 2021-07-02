<?php

namespace App\Http\Resources;

use App\Models\Param;
use Illuminate\Http\Resources\Json\JsonResource;

class ParamResource extends JsonResource {
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request $request
   * @return array
   */
  public function toArray($request) {
    /* @var Param|self $this */
    return [
      'id' => $this->id,
      'title' => $this->title,
    ];
  }
}
