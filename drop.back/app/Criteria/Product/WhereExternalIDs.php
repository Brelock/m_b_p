<?php

namespace App\Criteria\Product;

use App\Criteria\ICriteria;
use App\Models\Scopes\CriteriaScopes;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class WhereExternalIDs implements ICriteria {
  /**
   * @var array
   */
  protected $ids;

  /**
   * WhereExternalIDs constructor.
   *
   * @param array $ids
   */
  public function __construct(array $ids) {
    $this->ids = $ids;
  }

  /**
   * @param CriteriaScopes|EloquentBuilder|QueryBuilder $builder
   * @return CriteriaScopes|EloquentBuilder|QueryBuilder|mixed
   */
  public function apply($builder) {
    return $builder->when(!empty($this->ids), function($builder) {
      /* @var CriteriaScopes|EloquentBuilder|QueryBuilder $builder */
      return $builder->whereIn($builder->withAlias('external_id'), $this->ids);
    });
  }
}