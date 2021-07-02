<?php

namespace App\Criteria\Callback;

use App\Criteria\ICriteria;
use App\Models\Scopes\CriteriaScopes;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class WithDefaultRelationship implements ICriteria {
  /**
   * @param CriteriaScopes|EloquentBuilder|QueryBuilder $builder
   * @return CriteriaScopes|EloquentBuilder|QueryBuilder
   */
  public function apply($builder) {
    return $builder->with(static::relations());
  }

  /**
   * @return array
   */
  public static function relations() : array {
    return [
      //
    ];
  }
}