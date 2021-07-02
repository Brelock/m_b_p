<?php

namespace App\NovaPoshta\Enums;

use App\Enums\BaseEnum;

/**
 * Список видов плательщиков услуги доставки.
 */
class PayerTypes extends BaseEnum {
  /**
   * Отправитель.
   */
  const SENDER = 'Sender';

  /**
   * Получатель.
   */
  const RECIPIENT = 'Recipient';

  /**
   * Третя особа.
   */
  const THIRD_PERSON = 'ThirdPerson';
}