<?php

namespace App\Criteria\NovaPoshta\Warehouse;

use App\Criteria\ICriteria;
use App\Models\Scopes\CriteriaScopes;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class WhereCity implements ICriteria {
  /**
   * @var int
   */
  protected $cityId;

  /**
   * WhereCity constructor.
   *
   * @param int $cityId
   */
  public function __construct(int $cityId) {
    $this->cityId = $cityId;
  }

  /**
   * @param CriteriaScopes|EloquentBuilder|QueryBuilder $builder
   * @return CriteriaScopes|EloquentBuilder|QueryBuilder
   */
  public function apply($builder) {
    return $builder->where('city_id', $this->cityId);
  }
}