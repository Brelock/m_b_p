<?php

namespace App\Enums;

class SolutionsType extends BaseEnum {
  const PRIVATE_PERSON = 'private-person';
  const CREDIT = 'credit';

  public static $LABELS = [
    self::PRIVATE_PERSON => 'Частным лицам',
    self::CREDIT => 'Кредитование',
  ];
}