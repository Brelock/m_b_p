<?php

namespace App\Criteria\Builder;

use App\Criteria\Base\SortByStrategyCriteria;
use App\Criteria\News\OnlyPublished;
use App\Criteria\News\WithDefaultRelationship;

class NewsCriteriaBuilder extends CriteriaBuilder {
  /**
   * @return array
   */
	public function getListCriteria(): array {
		return $this->unionParentsAndChildrenCriteria(parent::getListCriteria(), [
		  new WithDefaultRelationship(),
			new OnlyPublished(),

			new SortByStrategyCriteria('publication_date', 'desc')
		]);
	}
}