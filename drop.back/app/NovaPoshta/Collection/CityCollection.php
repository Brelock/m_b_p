<?php

namespace App\NovaPoshta\Collection;

use App\NovaPoshta\Entity\BaseEntity;
use App\NovaPoshta\Entity\City;

class CityCollection extends BaseCollection {
  /**
   * @param array $item
   * @return BaseEntity
   */
  public function hydrate(array $item): BaseEntity {
    return City::createFromArray($item);
  }
}