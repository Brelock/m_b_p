<?php

namespace App\Criteria\Builder;

use App\Criteria\Base\SoftDeleted\OnlyTrashed;
use App\Criteria\Base\SoftDeleted\WithoutTrashed;
use App\Criteria\Base\SortByStrategyCriteria;
use App\Criteria\Project\OnlyMain;
use App\Criteria\Project\WithDefaultRelationship;

class ProjectCriteriaBuilder extends CriteriaBuilder {
	/**
	 * @var bool
	 */
	protected $latestThree = false;

	/**
	 * @param  bool $enable
	 * @return self
	 */
	public function enableLatestThree(bool $enable = true): self {
		$this->latestThree = $enable;
		return $this;
	}

	/**
	 * @var bool
	 */
	protected $mainPage = false;

	/**
	 * @param  bool $enable
	 * @return self
	 */
	public function mainPage(bool $enable = true): self {
		$this->mainPage = $enable;
		return $this;
	}

  /**
   * @return array
   */
	public function getListCriteria(): array {
		return $this->unionParentsAndChildrenCriteria(parent::getListCriteria(), [
		  new WithDefaultRelationship(),

      $this->mainPage ? new OnlyMain() : '',

			($this->request->has('onlyTrashed') ? new OnlyTrashed() : new WithoutTrashed()),

			new SortByStrategyCriteria('display_order', ($this->latestThree ? 'asc' : 'desc'))
		]);
	}
}