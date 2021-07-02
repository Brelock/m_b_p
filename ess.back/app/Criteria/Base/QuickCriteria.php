<?php

namespace App\Criteria\Base;

use App\Criteria\Helpers\HasJoins;
use App\Criteria\ICriteria;
use App\Models\Scopes\CriteriaScopes;

/**
 * Criteria using an anonymous function to quickly describe the conditions of the builder query without creating a separate criterion.
 *
 * @package App\Criteria\Base
 */
class QuickCriteria implements ICriteria {
  use HasJoins;

  /**
   * @var \Closure
   */
  protected $callback;

  /**
   * QuickCriteria constructor.
   *
   * @param \Closure $callback
   * @return void
   */
  public function __construct(\Closure $callback) {
    $this->callback = $callback;
  }

  /**
   * Call callback function and apply criteria to query builder.
   *
   * @param CriteriaScopes|\Illuminate\Database\Eloquent\Builder $builder
   * @return CriteriaScopes|\Illuminate\Database\Eloquent\Builder|mixed
   */
  public function apply($builder) {
    $constraints = $this->callback;
    return $constraints($builder);
  }
}