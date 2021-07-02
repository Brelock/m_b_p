<?php

namespace App\Delivery\Models;

use App\Delivery\Invoice;

class NullObjectInvoice implements Invoice {
  /**
   * @return string
   */
  public function getTTN(): string {
    return '';
  }

  /**
   * @return string
   */
  public function getRef(): string {
    return '';
  }

  /**
   * @return float
   */
  public function getCost(): float {
    return 0.00;
  }

  /**
   * @return array
   */
  public function toArray() : array {
    return [];
  }
}