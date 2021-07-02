<?php

namespace App\Criteria\Param;

use App\Criteria\ICriteria;
use App\Models\Scopes\CriteriaScopes;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class WhereTitles implements ICriteria {
  /**
   * @var array
   */
  protected $titles;

  /**
   * WhereTitles constructor.
   *
   * @param array $titles
   */
  public function __construct($titles) {
    $this->titles = $titles;
  }

  /**
   * @param CriteriaScopes|EloquentBuilder|QueryBuilder $builder
   * @return CriteriaScopes|EloquentBuilder|QueryBuilder
   */
  public function apply($builder) {
    return $builder->whereIn($builder->withAlias('title'), $this->titles);
  }
}