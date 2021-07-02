<?php

namespace App\Criteria\Builder;

use App\Criteria\Base\SoftDeleted\OnlyTrashed;
use App\Criteria\Base\SoftDeleted\WithoutTrashed;
use App\Criteria\Base\SortByStrategyCriteria;
use App\Criteria\Project\WithDefaultRelationship;

class ProductCriteriaBuilder extends CriteriaBuilder {

  /**
   * @return array
   */
	public function getListCriteria(): array {
		return $this->unionParentsAndChildrenCriteria(parent::getListCriteria(), [
		  new WithDefaultRelationship(),

			($this->request->has('onlyTrashed') ? new OnlyTrashed() : new WithoutTrashed()),

			new SortByStrategyCriteria('display_order',  'asc')
		]);
	}
}