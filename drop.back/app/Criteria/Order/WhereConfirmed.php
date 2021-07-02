<?php

namespace App\Criteria\Order;

use App\Criteria\ICriteria;
use App\Models\Scopes\CriteriaScopes;
use App\Models\Scopes\OrderScopes;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class WhereConfirmed implements ICriteria {
  /**
   * Adds a condition 'WHERE cookie_hash is null'.
   *
   * @param CriteriaScopes|EloquentBuilder|QueryBuilder|OrderScopes $builder
   * @return CriteriaScopes|EloquentBuilder|QueryBuilder|OrderScopes
   */
  public function apply($builder) {
    return $builder->whereNull('cookie_hash');
  }
}