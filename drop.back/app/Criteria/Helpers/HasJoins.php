<?php

namespace App\Criteria\Helpers;

use App\Models\Scopes\CriteriaScopes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

/**
 * Trait for set or exclude JOIN clause to query builder.
 *
 * @package App\Criteria\Helpers
 */
trait HasJoins {
  /**
   * Tables names for exclude from join in query builder.
   *
   * @var array $exceptJoins
   */
  protected $exceptJoins = [];

  /**
   * Tables names for join to query builder.
   *
   * @var array $includeJoins
   */
  protected $includeJoins = [];

  /**
   * Array with keys of tables names and their callbacks where apply join to query builder.
   *
   * For example,
   * ```php
   * // [
   * //   'excursion' => function(Builder $builder) {
   * //     return $builder->join('excursion', 'excursion.id', '=', 'ex_id');
   * //   },
   * // ]
   *
   * @return array
   */
  public function joins() : array {
    return [];
  }

  /**
   * Set keys of table names for sql joins which need be removed from query builder.
   *
   * @param array $tbNames
   * @return self
   */
  public function addExceptJoins(array $tbNames = []) {
    $this->exceptJoins = array_merge($this->exceptJoins, $tbNames);
    return $this;
  }

  /**
   * Returns excepted tables names.
   *
   * @return array
   */
  public function getExceptedJoins() {
    return $this->exceptJoins;
  }

  /**
   * Dynamic include joins.
   *
   * @param array $joins
   * @return $this
   */
  public function addJoins(array $joins) {
    $this->includeJoins = array_merge($this->includeJoins, $joins);
    return $this;
  }

  /**
   * Returns included tables names.
   *
   * @return array
   */
  public function getIncludedJoins() {
    return $this->includeJoins;
  }

  /**
   * Apply sql joins to query builder from array joins which may be disabled in the future.
   *
   * @param Builder|CriteriaScopes $builder
   * @param array $onlyJoins
   *
   * @return Builder|CriteriaScopes $builder
   */
  public function applyJoins($builder, array $onlyJoins = []) {
    /* @var \Closure[] $joins */
    $joins = array_merge(Arr::except($this->joins(), $this->exceptJoins), $this->includeJoins);
    $joins = Arr::only($joins, array_keys(($onlyJoins ?: $joins)));

    foreach($joins as $tbName => $join) {
      $join($builder);
    }

    return $builder;
  }
}