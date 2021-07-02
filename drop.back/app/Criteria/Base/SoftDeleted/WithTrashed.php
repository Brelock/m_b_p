<?php

namespace App\Criteria\Base\SoftDeleted;

use App\Criteria\ICriteria;
use App\Models\Scopes\CriteriaScopes;
use Illuminate\Database\Eloquent\SoftDeletes;

class WithTrashed implements ICriteria {
  /**
   * Adds a condition specifically described in the 'getFullTextSearchColumn' function of the model using the 'DefaultScoped' trait.
   *
   * @param SoftDeletes|CriteriaScopes|\Illuminate\Database\Query\Builder $builder
   * @return CriteriaScopes|\App\Query\EloquentBuilder|\Illuminate\Database\Query\Builder
   */
  public function apply($builder) {
    return $builder->withTrashed();
  }
}