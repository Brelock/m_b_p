<?php

namespace App\Criteria\Builder;

class SolutionCriteriaBuilder extends CriteriaBuilder {
  /**
   * @return array
   */
  public function getListCriteria(): array {
    return $this->unionParentsAndChildrenCriteria(parent::getListCriteria(), []);
  }
}