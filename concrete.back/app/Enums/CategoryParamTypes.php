<?php

namespace App\Enums;

class CategoryParamTypes extends BaseEnum {
  const LENGTH = 1;
  const WIDTH = 2;
  const HEIGHT = 3;
  const DIAMETER = 4;
  const DEPTH = 5;
  const QUANTITY = 6;

	public static $LABELS = [
		self::LENGTH => 'length',
		self::WIDTH => 'width',
		self::HEIGHT => 'height',
		self::DIAMETER => 'diameter',
		self::DEPTH => 'depth',
		self::QUANTITY => 'quantity',
	];
}