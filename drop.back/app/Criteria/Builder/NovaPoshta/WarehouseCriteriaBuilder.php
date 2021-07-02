<?php

namespace App\Criteria\Builder\NovaPoshta;

use App\Criteria\Builder\CriteriaBuilder;
use App\Criteria\NovaPoshta\Warehouse\WhereCity;

class WarehouseCriteriaBuilder extends CriteriaBuilder {
  /**
   * @return array
   */
  public function getListCriteria(): array {
    return $this->unionParentsAndChildrenCriteria(parent::getListCriteria(), [
      'cityId' => new WhereCity((int)$this->request->get('cityId')),
    ]);
  }
}