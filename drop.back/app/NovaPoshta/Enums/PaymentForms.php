<?php

namespace App\NovaPoshta\Enums;

use App\Enums\BaseEnum;

/**
 * Список форм оплат.
 */
class PaymentForms extends BaseEnum {
  /**
   * Безналичный расчет.
   */
  const NON_CASH = 'NonCash';

  /**
   * Наличный расчет.
   */
  const CASH = 'Cash';
}