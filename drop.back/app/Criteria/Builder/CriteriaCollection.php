<?php

namespace App\Criteria\Builder;

use App\Criteria\ICriteria;
use App\Criteria\ICriteriaBuilder;
use App\Models\Scopes\CriteriaScopes;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Collection;

/**
 * Criteria builder with collection of this criteria. Use Laravel's Collection for store this criteria.
 *
 * @package App\Criteria
 */
class CriteriaCollection implements ICriteriaBuilder {
  /**
   * Store for criteria.
   *
   * @var Collection $collection
  */
  private $collection;

  /**
   * CriteriaCollection constructor.
   *
   * @param ICriteria[] $criteriaList
   * @return void
   */
  public function __construct(array $criteriaList) {
    $this->collection = new Collection($criteriaList);
    $this->collection = $this->collection
      ->filter(function($criteria) { return !empty($criteria); })
      ->keyBy(function($criteria) {
        /* @var ICriteria $criteria */
        return get_class($criteria);
      });
  }

  /**
   * Returns builder by applies criteria.
   *
   * @param EloquentBuilder|QueryBuilder|CriteriaScopes $builder builder to be execute query and get results.
   * @return EloquentBuilder|QueryBuilder|CriteriaScopes
   */
  public function compose($builder) {
    $this->collection->each(function($criteria) use($builder) {
      /* @var ICriteria $criteria */
      return $this->applyCriteria($criteria, $builder);
    });

    return $builder;
  }

  /**
   * Returns builder by applied single criteria.
   *
   * @param ICriteria $criteria the criteria condition.
   * @param EloquentBuilder|QueryBuilder|CriteriaScopes $builder builder to be execute query and get results.
   * @return EloquentBuilder|QueryBuilder|CriteriaScopes
   */
  public function applyCriteria(ICriteria $criteria, $builder) {
    return $criteria->apply($builder);
  }

  /**
   * @param string $criteriaClassName
   * @return ICriteriaBuilder
   */
  public function addExceptedCriteriaClassName(string $criteriaClassName): ICriteriaBuilder {
    $this->collection->except($criteriaClassName);
    return $this;
  }

  /**
   * @return array
   */
  public function getListCriteria(): array {
    return $this->collection->all();
  }

  /**
   * @return bool
   */
  public function hasListCriteria() : bool {
    return $this->collection->isNotEmpty();
  }
}