<?php

namespace App\Criteria\News;

use App\Criteria\ICriteria;
use App\Models\News;
use App\Models\Scopes\CriteriaScopes;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

/**
 * Criteria for selecting published review with flag `is_published` with true.
 *
 * @package App\Criteria\Review
 */
class OnlyPublished implements ICriteria {
  /**
   * Add a basic where clause to the query. Example: 'WHERE `is_published` = 1'.
   *
   * @param CriteriaScopes|EloquentBuilder|QueryBuilder $builder
   * @return CriteriaScopes|EloquentBuilder|QueryBuilder
   */
  public function apply($builder) {
    return $builder->where($builder->withAlias('is_published'), '=', News::IS_PUBLISHED);
  }
}
