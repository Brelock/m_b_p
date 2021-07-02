<?php

namespace App\Enums;

class CategoryTypes extends BaseEnum {
  const SLAB = 1;
  const WALL = 2;
  const COLUMN = 3;

	public static $LABELS = [
		self::SLAB => 'slab',
		self::WALL => 'wall',
		self::COLUMN => 'column'
	];

	public static $TYPES_PICTURES = [
		self::SLAB => [
			CategoryPictureTypes::MAIN,
			CategoryPictureTypes::LENGTH,
			CategoryPictureTypes::WIDTH,
			CategoryPictureTypes::HEIGHT
			],
		self::WALL => [
			CategoryPictureTypes::MAIN,
			CategoryPictureTypes::LENGTH,
			CategoryPictureTypes::WIDTH,
			CategoryPictureTypes::HEIGHT
			],
		self::COLUMN => [
			CategoryPictureTypes::MAIN,
			CategoryPictureTypes::DIAMETER,
			CategoryPictureTypes::DEPTH
			],
	];

	public static $PARAMS = [
		self::SLAB => [
			CategoryParamTypes::LENGTH,
			CategoryParamTypes::WIDTH,
			CategoryParamTypes::HEIGHT,
			CategoryParamTypes::QUANTITY
			],
		self::WALL => [
			CategoryParamTypes::LENGTH,
			CategoryParamTypes::WIDTH,
			CategoryParamTypes::HEIGHT,
			CategoryParamTypes::QUANTITY
			],
		self::COLUMN => [
			CategoryParamTypes::DIAMETER,
			CategoryParamTypes::DEPTH,
			CategoryParamTypes::QUANTITY
			],
	];
}