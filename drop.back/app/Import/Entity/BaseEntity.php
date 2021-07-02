<?php

namespace App\Import\Entity;

use Illuminate\Contracts\Support\Arrayable;

abstract class BaseEntity implements Arrayable {
  /**
   * @param array $attributes
   * @return BaseEntity
   */
  abstract public static function mapFromArray(array $attributes) : self;
}