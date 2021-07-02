<?php

namespace App\Models\Mixins;

use App\Collection\OrderProductCollection;
use App\Enums\OrderOptions;
use App\Helpers\NumberHelper;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

trait OrderProductMixin {
  /**
   * @param Builder $query
   * @param string $value
   * @return bool
   */
  protected function getFullTextSearchColumn($query, $value) {
    return false;
  }

  /**
   * @param array $models
   * @return OrderProductCollection|\Illuminate\Database\Eloquent\Collection
   */
  public function newCollection(array $models = []) {
    return new OrderProductCollection($models);
  }

  /**
   * @param float $price
   * @return float
   */
  public function calculateAmount(float $price) : float {
    return NumberHelper::round(($price * $this->quantity));
  }

  /**
   * @return float
   */
  public function calculateFinalAmount() : float {
    $amount = $this->calculateAmount($this->price_drop);

    if($amount >= OrderOptions::PRICE_TRADE_FROM_MIN_AMOUNT)
      $amount = $this->calculateAmount($this->price_trade);

    return $amount;
  }

  /**
   * @param Product $product
   * @return OrderProductMixin
   */
  public function copyPriceFromProduct(Product $product) : self {
    $this->price_drop = $product->price_old;
    $this->price_trade = $product->price;

    return $this;
  }
}