<?php

namespace App\Import\Collection;

use Illuminate\Support\Collection;

class OfferParamCollection extends Collection {
  /**
   * @return array
   */
  public function getTitles() : array {
    return $this->keys()->all();
  }

  /**
   * @return array
   */
  public function getValues() : array {
  	return $this->values()->all();
  }
}