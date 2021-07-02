<?php

namespace App\Http\Resources;

use App\Models\OrderProduct;

class OrderProductResource extends JsonResource {
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request $request
   * @return array
   */
  public function toArray($request) {
    /* @var OrderProduct|self $this */
    return [
      'id' => $this->id,
      'order_id' => $this->order_id,
      'product_id' => $this->product_id,
      'quantity' => $this->quantity,
      'price_drop' => $this->price_drop,
      'price_trade' => $this->price_trade,

      'amount_drop' => $this->calculateAmount($this->price_drop),
      'amount_trade' => $this->calculateAmount($this->price_trade),

      'product' => new ProductResource($this->whenLoaded('product')),
    ];
  }
}
