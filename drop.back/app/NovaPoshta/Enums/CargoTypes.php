<?php

namespace App\NovaPoshta\Enums;

use App\Enums\BaseEnum;

/**
 * Список типов груза.
 */
class CargoTypes extends BaseEnum {
  /**
   * Вантаж.
   */
  const CARGO = 'Cargo';

  /**
   * Документи.
   */
  const DOCUMENTS = 'Documents';

  /**
   * Шини-диски.
   */
  const TIRES_WHEELS = 'TiresWheels';

  /**
   * Палети.
   */
  const PALLET = 'Pallet';

  /**
   * Посилка.
   */
  const PARCEL = 'Parcel';
}