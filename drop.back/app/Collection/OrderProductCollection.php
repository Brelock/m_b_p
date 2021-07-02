<?php

namespace App\Collection;

use App\Collection\Helpers\CommonHelper;
use App\Enums\OrderOptions;
use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Collection;

class OrderProductCollection extends Collection {
  use CommonHelper;

  /**
   * Calculate total amount of list products in order with using drop price.
   *
   * @return float
   */
  public function dropTotalAmount(): float {
    return $this->totalAmount(function ($orderProduct) {
      /* @var OrderProduct $orderProduct */

      return $orderProduct->price_drop;
    });
  }

  /**
   * Calculate total amount of list products in order with using trade price.
   *
   * @return float
   */
  public function tradeTotalAmount(): float {
    return $this->totalAmount(function ($orderProduct) {
      /* @var OrderProduct $orderProduct */

      return $orderProduct->price_trade;
    });
  }

  /**
   * Calculate total amount of list products in order by specific price.
   *
   * @param \Closure $getPrice
   * @return float
   */
  public function totalAmount(\Closure $getPrice): float {
    $this->ensureItemsConsisting(OrderProduct::class);

    return $this->sum(function ($orderProduct) use ($getPrice) {
      /* @var OrderProduct $orderProduct */
      return $orderProduct->calculateAmount($getPrice($orderProduct));
    });
  }

  /**
   * Calculate total amount of list products in order with final version by using trade or drop prices.
   *
   * @return float
   */
  public function finalTotalAmount(): float {
    $total = $this->tradeTotalAmount();

    if ($total < OrderOptions::PRICE_TRADE_FROM_MIN_AMOUNT)
      $total = $this->dropTotalAmount();

    return $total;
  }
}