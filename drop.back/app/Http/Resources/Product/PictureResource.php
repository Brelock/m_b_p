<?php

namespace App\Http\Resources\Product;

use App\Models\ProductPicture;
use Illuminate\Http\Resources\Json\JsonResource;

class PictureResource extends JsonResource {
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request $request
   * @return array
   */
  public function toArray($request) {
    /* @var ProductPicture|self $this */
    return [
      'id' => $this->id,
      'product_id' => $this->product_id,

      'file_name' => $this->file_name,
      'thumbnail_name' => $this->thumbnail_name,

      'full_link' => $this->assetAbsolute($this->file_name),
      'thumbnail_full_link' => $this->assetAbsolute(($this->thumbnail_name ?: $this->file_name)),
    ];
  }
}
