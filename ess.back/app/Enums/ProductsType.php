<?php

namespace App\Enums;

class ProductsType extends BaseEnum {
  const KNESS = 1;
  const PERFORMANCE = 2;
  const MAXEON = 3;
  const SUNPORT = 4;

  public static $LABELS = [
    self::KNESS => 'KNESS',
    self::PERFORMANCE => 'PERFORMANCE',
    self::MAXEON => 'MAXEON',
    self::SUNPORT => 'SUNPORT',
  ];
}