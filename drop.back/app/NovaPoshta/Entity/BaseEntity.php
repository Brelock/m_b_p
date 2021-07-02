<?php

namespace App\NovaPoshta\Entity;

use Illuminate\Contracts\Support\Arrayable;

abstract class BaseEntity implements Arrayable {
  /**
   * @param array $attributes
   * @return BaseEntity
   */
  abstract public static function createFromArray(array $attributes) : self;
}