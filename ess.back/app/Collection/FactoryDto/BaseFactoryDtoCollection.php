<?php

namespace App\Collection\FactoryDto;

use App\Collection\Helpers\CommonHelper;
use Illuminate\Support\Collection;

abstract class BaseFactoryDtoCollection extends Collection {
  use CommonHelper;

  /**
   * Initialize items.
   *
   * @return static
   */
  public function init() {
    $this->items = $this->toDtoList()->all();
    return $this;
  }

  /**
   * @return BaseFactoryDtoCollection
   */
  abstract public function toDtoList() : self;
}