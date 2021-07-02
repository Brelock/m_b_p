<?php

namespace App\Criteria\Builder;

use App\Criteria\Base\SelectAll;
use App\Criteria\Base\SortByStrategyCriteria;
use App\Criteria\Order\OnlyActive;
use App\Criteria\Order\OnlyArchived;
use App\Criteria\Order\WithDefaultRelationship;
use App\Criteria\Order\WhereConfirmed;

class OrderCriteriaBuilder extends BaseCriteriaBuilder {
  /**
   * @var bool
   */
  protected $onlyArchived = false;

  /**
   * @param  bool $enable
   * @return self
   */
  public function enableOnlyArchived(bool $enable = true): self {
    $this->onlyArchived = $enable;
    return $this;
  }

  /**
   * @return array
   */
  public function getListCriteria(): array {
    return [
      new SelectAll(),

      new WithDefaultRelationship(),
      new WhereConfirmed(),

      (!$this->onlyArchived ? new OnlyActive() : null),

      ($this->onlyArchived ? new OnlyArchived() : null),

      new SortByStrategyCriteria('created_at', 'desc'),
    ];
  }
}