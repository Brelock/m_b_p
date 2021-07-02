<?php

namespace App\Criteria\Builder;


use App\Criteria\Base\SortByStrategyCriteria;
use App\Criteria\Review\OnlyFotoReviews;
use App\Criteria\Review\OnlyTextReviews;
use App\Criteria\Review\OnlyVideoReviews;
use App\Criteria\Review\WithDefaultRelationship;


class ReviewCriteriaBuilder extends CriteriaBuilder {
  /**
   * @var bool
   */
  protected $onlyTextReviews = false;

  /**
   * @var bool
   */
  protected $onlyVideoReviews = false;

  /**
   * @var bool
   */
  protected $onlyFotoReviews = false;

  /**
   * @param bool $enable
   * @return self
   */
  public function enableOnlyTextReviews(bool $enable = true): self {
    $this->onlyTextReviews = $enable;
    return $this;
  }

  /**
   * @param bool $enable
   * @return self
   */
  public function enableOnlyVideoReviews(bool $enable = true): self {
    $this->onlyVideoReviews = $enable;
    return $this;
  }

  /**
   * @param bool $enable
   * @return self
   */
  public function enableOnlyFotoReviews(bool $enable = true): self {
    $this->onlyFotoReviews = $enable;
    return $this;
  }

  /**
   * @return array
   */
	public function getListCriteria(): array {
		return $this->unionParentsAndChildrenCriteria(parent::getListCriteria(), [

      ($this->onlyTextReviews ? new OnlyTextReviews() : null),
      ($this->onlyVideoReviews ? new OnlyVideoReviews() : null),
      ($this->onlyFotoReviews ? new OnlyFotoReviews() : null),

		  new WithDefaultRelationship(),

			new SortByStrategyCriteria('display_order', 'desc')
		]);
	}
}