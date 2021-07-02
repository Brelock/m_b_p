<?php

namespace App\Criteria;

use App\Models\Scopes\CriteriaScopes;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

/**
 * Interface for building a query based on a list of criteria.
 *
 * @package App\Criteria
 */
interface ICriteriaBuilder {
  /**
   * Returns builder by applies criteria.
   *
   * @param EloquentBuilder|QueryBuilder|CriteriaScopes $builder builder to be execute query and get results.
   * @return EloquentBuilder|QueryBuilder|CriteriaScopes
   */
  public function compose($builder);

  /**
   * Returns builder by applied single criteria.
   *
   * @param ICriteria $criteria the criteria condition.
   * @param EloquentBuilder|QueryBuilder|CriteriaScopes $builder builder to be execute query and get results.
   * @return EloquentBuilder|QueryBuilder|CriteriaScopes
   */
  public function applyCriteria(ICriteria $criteria, $builder);

  /**
   * Exclude criteria from the list.
   *
   * @param string $criteriaClassName class name of class implements ICriteria
   * @return self
   */
  public function addExceptedCriteriaClassName(string $criteriaClassName) : self;

  /**
   * Returns a list of possible search criteria.
   *
   * For example,
   *
   * ```php
   *
   * // the result is:
   * // [
   *        // without check request
   *        // add to query by default
   * //     new \App\Criteria\Base\FullTextSearchCriteria($this->request->get('q')),
   * //
   *        // with check exist parameters in request
   * //     'q' => new \App\Criteria\Base\FullTextSearchCriteria($this->request->get('q')),
   * //     'orderByColumn' => new \App\Criteria\Base\SortByStrategyCriteria($this->request->get('orderByColumn'), $this->request->get('orderByMethod', 'asc'))
   * // ]
   *
   * @return ICriteria[]
   */
  public function getListCriteria() : array;

  /**
   * Check has list criteria.
   *
   * @return bool
   */
  public function hasListCriteria() : bool;
}