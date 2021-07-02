<?php

namespace App\NovaPoshta\Collection;

use App\NovaPoshta\Entity\BaseEntity;
use App\NovaPoshta\Entity\Warehouse;

class WarehouseCollection extends BaseCollection {
  /**
   * @param array $item
   * @return BaseEntity
   */
  public function hydrate(array $item): BaseEntity {
    return Warehouse::createFromArray($item);
  }
}