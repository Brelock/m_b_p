<?php

namespace App\Criteria\Product;

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
      'pictures',
      'params',
      'productParams.param',
      'category',
      'category.parent',
      'category.parent.parent',
      'category.parent.parent.parent'
    ];
  }
}