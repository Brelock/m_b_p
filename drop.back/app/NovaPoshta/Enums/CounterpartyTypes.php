<?php

namespace App\NovaPoshta\Enums;

use App\Enums\BaseEnum;

/**
 * Список типов контрагентов.
 */
class CounterpartyTypes extends BaseEnum {
  /**
   * Организация.
   */
  const PRIVATE_PERSON = 'PrivatePerson';

  /**
   * Частное лицо.
   */
  const ORGANIZATION = 'Organization';
}