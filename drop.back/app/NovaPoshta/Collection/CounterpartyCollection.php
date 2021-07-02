<?php

namespace App\NovaPoshta\Collection;

use App\NovaPoshta\Entity\BaseEntity;
use App\NovaPoshta\Entity\Counterparty;

class CounterpartyCollection extends BaseCollection {
  /**
   * @param array $item
   * @return BaseEntity
   */
  public function hydrate(array $item): BaseEntity {
    return Counterparty::createFromArray($item);
  }

  /**
   * @param callable|null $callback
   * @param null $default
   * @return Counterparty|null
   */
  public function first(callable $callback = null, $default = null) : ?Counterparty {
    return parent::first($callback, $default);
  }
}