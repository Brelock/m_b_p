<?php

namespace App\Criteria\Builder;

use App\Criteria\Base\SelectAll;
use App\Criteria\Base\SortByStrategyCriteria;
use App\Criteria\Cart\InCart;
use App\Criteria\Cart\WithDefaultRelationship;
use App\Helpers\Auth\AuthenticatedUser;

class CartCriteriaBuilder extends BaseCriteriaBuilder {
  /**
   * @return array
   */
  public function getListCriteria(): array {
    return [
      new SelectAll(),

      new WithDefaultRelationship(),
      new InCart(AuthenticatedUser::getOrGenerateHashInSession($this->getRequest())),

      new SortByStrategyCriteria('created_at', 'desc'),
    ];
  }
}