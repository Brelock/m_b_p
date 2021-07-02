<?php

namespace App\Enums;

class CategoryPictureTypes extends BaseEnum {
  const MAIN = 1;
  const LENGTH = 2;
  const WIDTH = 3;
  const HEIGHT = 4;
  const DIAMETER = 5;
  const DEPTH = 6;

	public static $LABELS = [
		self::MAIN => 'main',
		self::LENGTH => 'length',
		self::WIDTH => 'width',
		self::HEIGHT => 'height',
		self::DIAMETER => 'diameter',
		self::DEPTH => 'depth',
	];
}