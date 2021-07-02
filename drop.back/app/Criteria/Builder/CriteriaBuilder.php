<?php

namespace App\Criteria\Builder;

use App\Criteria\Base\FullTextSearchCriteria;
use App\Criteria\Base\SortByStrategyCriteria;

/**
 * Criteria builder with a list of default criteria using standard parameters for word search and sorting.
 *
 * @package App\Criteria
 */
class CriteriaBuilder extends BaseCriteriaBuilder {
  /**
   * List of criteria with criteria for full text search, sortable.
   *
   * @return array
   */
  public function getListCriteria(): array {
    return [
      'q' => new FullTextSearchCriteria($this->request->get('q')),
      'orderByColumn' => new SortByStrategyCriteria(
        $this->request->get('orderByColumn', 'created_at'),
        $this->request->get('orderByMethod', 'desc')
      ),
    ];
  }
}