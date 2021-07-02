<?php

namespace App\Enums;

class DeliveryTypes extends BaseEnum {
  const NOVA_POSHTA = 1;
  const JUSTIN = 2;
  const UKR_POSHTA = 3;
  const PICKUP = 4;

  public static $LABELS = [
    self::NOVA_POSHTA => 'Новая почта',
    self::JUSTIN => 'Justin',
    self::UKR_POSHTA => 'Укр. почта',
    self::PICKUP => 'Самовывоз',
  ];
}