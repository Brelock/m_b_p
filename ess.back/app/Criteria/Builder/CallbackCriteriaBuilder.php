<?php

namespace App\Criteria\Builder;

use App\Criteria\Base\SortByStrategyCriteria;

class CallbackCriteriaBuilder extends CriteriaBuilder {
  /**
   * @return array
   */
	public function getListCriteria(): array {
		return  [

			new SortByStrategyCriteria('created_at', 'desc')

		];
	}
}