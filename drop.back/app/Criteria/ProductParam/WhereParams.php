<?php

namespace App\Criteria\ProductParam;

use App\Criteria\ICriteria;
use App\Models\Scopes\CriteriaScopes;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class WhereParams implements ICriteria {
  /**
   * @var array
   */
  protected $paramsIds;

  /**
   * WhereParams constructor.
   *
   * @param array $paramsIds
   */
  public function __construct(array $paramsIds) {
    $this->paramsIds = $paramsIds;
  }

  /**
   * @param CriteriaScopes|EloquentBuilder|QueryBuilder $builder
   * @return CriteriaScopes|EloquentBuilder|QueryBuilder
   */
  public function apply($builder) {
    return $builder->whereIn($builder->withAlias('param_id'), $this->paramsIds);
  }
}