<?php

namespace App\Collection\Helpers;

use Illuminate\Support\Collection;

/**
 * Trait CommonHelper for Laravel's Collection.
 *
 * @package App\Collections\Helpers
 */
trait CommonHelper {
  /**
   * Check consisting by instance with input class name.
   *
   * @param string $class
   * @return void
   * @throws \LogicException
   */
  public function ensureItemsConsisting(string $class) {
    /* @var Collection|self $this */
    if($this->isNotEmpty() && !$this->hasItemsConsisting($class)) {
      throw new \LogicException("Items in this collection must be an instance {$class}.");
    }
  }

  /**
   * Check consisting by instance with input class name.
   *
   * @param string $class
   * @return bool
   */
  public function hasItemsConsisting(string $class) {
    if($this->isNotEmpty()) {
      $firstPriceItem = $this->first();
      return $firstPriceItem && $firstPriceItem instanceof $class;
    }

    return false;
  }
}