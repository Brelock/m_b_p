<?php

namespace App\Criteria\Base;

use App\Criteria\ICriteria;
use App\Models\Scopes\CriteriaScopes;

/**
 * Criteria for adds alias in expression SQL query 'FROM `table` as alias'.
 *
 * @package App\Criteria\Base
 */
class WithAlias implements ICriteria {
  /**
   * @var string
   */
  protected $alias;

  /**
   * WithAlias constructor.
   *
   * @param string $alias
   * @return void
   */
  public function __construct($alias) {
    $this->alias = $alias;
  }

  /**
   * Adds alias in expression SQL query 'FROM `table` as alias'.
   * Use scoped function 'alias' in trait DefaultScoped.
   *
   * @param CriteriaScopes|\Illuminate\Database\Eloquent\Builder $builder
   * @return CriteriaScopes|\Illuminate\Database\Eloquent\Builder
   */
  public function apply($builder) {
    return $builder->alias($this->alias);
  }
}