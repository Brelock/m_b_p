<?php

namespace App\Criteria\Order;

class WithDefaultRelationship extends \App\Criteria\Cart\WithDefaultRelationship {
  /**
   * @return array
   */
  public static function relations() : array {
    return array_merge([
      'novaPoshtaCity',
      'novaPoshtaWarehouse',
      'novaPoshtaInternetDocument',
    ], parent::relations());
  }
}