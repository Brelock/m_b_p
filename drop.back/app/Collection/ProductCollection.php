<?php

namespace App\Collection;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductCollection extends Collection {
  /**
   * Returns collections with keys by external_id from Category.
   *
   * @return ProductCollection
   */
  public function keyByExternalId() {
    return $this->keyBy(function($product) {
      /* @var Product $product */
      if($product->hasExternalId())
        return $product->external_id;

      return $product->id;
    });
  }

  /**
   * @param int $id
   * @return Product|null
   */
  public function findByExternalId(int $id) : ?Product {
    return $this->firstWhere('external_id', $id);
  }
}