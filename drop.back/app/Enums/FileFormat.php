<?php

namespace App\Enums;

class FileFormat extends BaseEnum {
  const XML = 1;
	const YML = 2;
	const XLSX = 3;
	const XLS = 4;

	public static $LABELS = [
		self::XML => 'XML',
		self::YML => 'YML',
		self::XLSX => 'XLSX',
		self::XLS => 'XLS',
	];
}