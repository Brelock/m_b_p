<?php

namespace App\NovaPoshta\Enums;

use App\Enums\BaseEnum;

/**
 * Список типов технологий доставки.
 */
class ServiceTypes extends BaseEnum {
  /**
   * Двері-Двері.
   */
  const DOORS_DOORS = 'DoorsDoors';

  /**
   * Двері-Склад.
   */
  const DOORS_WAREHOUSE = 'DoorsWarehouse';

  /**
   * Склад-Склад.
   */
  const WAREHOUSE_WAREHOUSE = 'WarehouseWarehouse';

  /**
   * Склад-Двері.
   */
  const WAREHOUSE_DOORS = 'WarehouseDoors';
}