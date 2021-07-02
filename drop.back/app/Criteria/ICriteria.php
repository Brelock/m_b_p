<?php

namespace App\Criteria;

use App\Models\Scopes\CriteriaScopes;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

/**
 * Interface to describe the rules to the query builder.
 *
 * @package App\Criteria
 */
interface ICriteria {
  /**
   * Apply criteria conditions to query builder.
   *
   * @param EloquentBuilder|QueryBuilder|CriteriaScopes $builder builder to be execute query and get results.
   * @return EloquentBuilder|QueryBuilder|CriteriaScopes
   */
  public function apply($builder);
}