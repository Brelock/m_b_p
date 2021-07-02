<?php

namespace App\NovaPoshta\Collection;

use App\NovaPoshta\Entity\BaseEntity;
use App\NovaPoshta\Entity\CounterpartyContactPerson;

class CounterpartyContactPersonCollection extends BaseCollection {
  /**
   * @param array $item
   * @return BaseEntity
   */
  public function hydrate(array $item): BaseEntity {
    return CounterpartyContactPerson::createFromArray($item);
  }

  /**
   * @param callable|null $callback
   * @param null $default
   * @return CounterpartyContactPerson|null
   */
  public function first(callable $callback = null, $default = null) : ?CounterpartyContactPerson {
    return parent::first($callback, $default);
  }
}