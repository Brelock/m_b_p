<?php

namespace App\Criteria\Review;

use App\Criteria\ICriteria;
use App\Enums\ReviewsType;
use App\Models\Scopes\CriteriaScopes;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

/**
 *
 * @package App\Criteria\Review
 */
class OnlyTextReviews implements ICriteria {
  /**
   *
   * @param CriteriaScopes|EloquentBuilder|QueryBuilder $builder
   * @return CriteriaScopes|EloquentBuilder|QueryBuilder
   */
  public function apply($builder) {
    return $builder->where($builder->withAlias('type'), '=', ReviewsType::TEXT_REVIEWS);
  }
}
