<?php

namespace App\Criteria\Project;

use App\Criteria\ICriteria;
use App\Models\Project;
use App\Models\Scopes\CriteriaScopes;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

/**
 * Criteria for selecting main review with flag `is_main` with true.
 *
 * @package App\Criteria\Review
 */
class OnlyMain implements ICriteria {
  /**
   * Add a basic where clause to the query. Example: 'WHERE `is_main` = 1'.
   *
   * @param CriteriaScopes|EloquentBuilder|QueryBuilder $builder
   * @return CriteriaScopes|EloquentBuilder|QueryBuilder
   */
  public function apply($builder) {
    return $builder->where($builder->withAlias('is_main'), '=', Project::IS_MAIN);
  }
}
