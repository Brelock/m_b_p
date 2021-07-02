<?php

namespace App\Delivery;

use Illuminate\Contracts\Support\Arrayable;

interface Invoice extends Arrayable {
  /**
   * Number of the invoice.
   *
   * @return string
   */
  public function getTTN() : string;

  /**
   * External ID of the invoice.
   *
   * @return string
   */
  public function getRef() : string;

  /**
   * Total of the invoice.
   *
   * @return float
   */
  public function getCost() : float;
}