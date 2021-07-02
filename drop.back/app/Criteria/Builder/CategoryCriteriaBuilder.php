<?php

namespace App\Criteria\Builder;

use App\Criteria\Category\WithDefaultRelationship;


class CategoryCriteriaBuilder extends CriteriaBuilder {
  /**
   * @return array
   */
  public function getListCriteria(): array {
    return $this->unionParentsAndChildrenCriteria(parent::getListCriteria(), [
      new WithDefaultRelationship(),
    ]);
  }
}