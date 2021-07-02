<?php

namespace App\Criteria\Base;

use App\Criteria\ICriteria;
use App\Models\Scopes\CriteriaScopes;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class SelectAll implements ICriteria {
  /**
   * @param CriteriaScopes|EloquentBuilder|QueryBuilder $builder
   * @return CriteriaScopes|EloquentBuilder|QueryBuilder
   */
  public function apply($builder) {
    return $builder->select($builder->withAlias('*'));
  }
}