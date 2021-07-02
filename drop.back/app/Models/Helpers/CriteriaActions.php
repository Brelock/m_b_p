<?php

namespace App\Models\Helpers;

use App\Criteria\Builder\BaseCriteriaBuilder;
use App\Criteria\ICriteriaBuilder;
use App\Helpers\RequestHelper;
use App\Models\Scopes\CriteriaScopes;
use App\Query\EloquentBuilder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection as SupportCollection;

trait CriteriaActions {
  use CriteriaScopes;

  /**
   * Get absolute all items from store.
   *
   * @param ICriteriaBuilder|BaseCriteriaBuilder $criteriaBuilder
   * @param integer $max
   *
   * @return EloquentCollection|SupportCollection
   */
  public static function fetchAll(ICriteriaBuilder $criteriaBuilder, $max = -1) {
    return static::filter($criteriaBuilder, $max);
  }

  /**
   * @param ICriteriaBuilder $criteriaBuilder
   * @return EloquentCollection|SupportCollection
   */
  public function fetchAllIfHasCriteria(ICriteriaBuilder $criteriaBuilder) {
    if(!$criteriaBuilder->hasListCriteria()) {
      return new EloquentCollection();
    }

    return static::fetchAll($criteriaBuilder);
  }

  /**
   * Filter items by criteria builder.
   *
   * @param ICriteriaBuilder|BaseCriteriaBuilder $criteriaBuilder
   * @param int $max
   * @param int $page
   *
   * @return EloquentCollection|SupportCollection
   */
  public static function filter(ICriteriaBuilder $criteriaBuilder, int $max = 15, int $page = 1) {
    $query = static::fromCriteriaBuilder($criteriaBuilder);

    $offset = RequestHelper::offsetPages($max, $page);
    if($offset > 0)
      $query->offset($offset);

    return $query
      ->limit($max)
      ->get();
  }

  /**
   * Chunk the results of the query.
   *
   * @param ICriteriaBuilder $criteriaBuilder
   * @param callable $callback
   * @param int $max
   *
   * @return bool
   */
  public static function chunk(ICriteriaBuilder $criteriaBuilder, callable $callback, int $max = 15) {
    $query = static::fromCriteriaBuilder($criteriaBuilder);

    return $query->chunk($max, $callback);
  }

  /**
   * Filter items by criteria builder and paginate.
   *
   * @param ICriteriaBuilder $criteriaBuilder
   * @param int $max
   * @param int $page
   *
   * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Pagination\LengthAwarePaginator
   */
  public static function filterToPaginate(ICriteriaBuilder $criteriaBuilder, int $max = 15, int $page = 1) {
    return static::fromCriteriaBuilder($criteriaBuilder)->prePaginate($max, $page);
  }

  /**
   * Filter items by criteria builder and paginate.
   *
   * @param ICriteriaBuilder $criteriaBuilder
   * @param int $max
   * @param int $page
   * @return LengthAwarePaginator
   */
  public static function filterToPaginateIfHasCriteria(ICriteriaBuilder $criteriaBuilder, int $max = 15, int $page = 1) {
    if($criteriaBuilder->hasListCriteria())
      return static::fromCriteriaBuilder($criteriaBuilder)->prePaginate($max, $page);

    return new LengthAwarePaginator([], 0, $max);
  }

  /**
   * Find one item by criteria builder.
   *
   * @param ICriteriaBuilder $criteriaBuilder
   *
   * @return CriteriaScopes|EloquentBuilder|\Illuminate\Database\Eloquent\Model|null|object returns first model
   */
  public static function findOne(ICriteriaBuilder $criteriaBuilder) {
    return static::fromCriteriaBuilder($criteriaBuilder)->first();
  }

  /**
   * Find one item by criteria builder.
   *
   * @param ICriteriaBuilder $criteriaBuilder
   * @return CriteriaScopes|EloquentBuilder|\Illuminate\Database\Eloquent\Model|null|object returns first model
   */
  public static function findOneIfHasCriteria(ICriteriaBuilder $criteriaBuilder) {
    if($criteriaBuilder->hasListCriteria())
      return static::fromCriteriaBuilder($criteriaBuilder)->first();

    return null;
  }

  /**
   * Find one item by criteria builder or throw exception by not found record.
   *
   * @param ICriteriaBuilder $criteriaBuilder
   * @return CriteriaScopes|EloquentBuilder|\Illuminate\Database\Eloquent\Model|null|object returns first model
   */
  public static function findOneOrFail(ICriteriaBuilder $criteriaBuilder) {
    return static::fromCriteriaBuilder($criteriaBuilder)->firstOrFail();
  }

  /**
   * Check exist item by criteria builder.
   *
   * @param ICriteriaBuilder $criteriaBuilder
   * @return bool
   */
  public static function exists(ICriteriaBuilder $criteriaBuilder) : bool {
    return static::fromCriteriaBuilder($criteriaBuilder)->exists();
  }
}