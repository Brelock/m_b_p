<?php

namespace App\Models\Helpers;

trait SingletonModel {
  /**
   * @return SingletonModel|static
   */
  public static function getInstanceModel() {
    $first = static::first();
    if ($first)
      return $first;

    return new static();
  }
}