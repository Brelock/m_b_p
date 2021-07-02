<?php

namespace App\NovaPoshta\Enums;

use App\Enums\BaseEnum;

/**
 * Свойства контрагента.
 */
class CounterpartyProperties extends BaseEnum {
  /**
   * Получатель.
   */
  const RECIPIENT = 'Recipient';

  /**
   * Третья особа.
   */
  const THIRD_PERSON = 'ThirdPerson';
}