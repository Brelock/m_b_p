<?php

namespace App\Enums;

class CallbacksType extends BaseEnum {
  const QUESTION = 1;
  const REQUEST = 2;
  const PARTNER = 3;
  const INDIVIDUAL_CALCULATION = 4;
  const ENTERPRISE_CALCULATION = 5;
  const CREDIT = 6;
  const INSURANCE = 7;
  const SUNPORT_CALCULATION = 8;

	public static $LABELS = [
		self::QUESTION => 'Вопрос',
		self::REQUEST => 'Запрос',
		self::PARTNER => 'Партнерство',
		self::INDIVIDUAL_CALCULATION => 'Расчет частному лицу',
		self::ENTERPRISE_CALCULATION => 'Расчет предприятию',
		self::CREDIT => 'Кредитирование',
		self::INSURANCE => 'Страхование',
		self::SUNPORT_CALCULATION => 'Sunport расчет'
	];
}