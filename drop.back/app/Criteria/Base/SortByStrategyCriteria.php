<?php

namespace App\Criteria\Base;

use App\Criteria\ICriteria;
use App\Models\Scopes\CriteriaScopes;
use Webmozart\Assert\Assert;

/**
 * Base criteria for sort items.
 *
 * @package App\Criteria\Base
 */
class SortByStrategyCriteria implements ICriteria {
  /**
   * @var string
   */
  protected $column;

  /**
   * @var string
   */
  protected $strategy = 'asc';

  /**
   * SortByStrategyCriteria constructor.
   *
   * @param string $column
   * @param string $strategy
   *
   * @return void
   */
  public function __construct($column = 'display_order', $strategy = 'asc') {
    // Assert::oneOf($strategy, ['asc', 'desc']);

    $this->column = $column ?: 'display_order';
    $this->strategy = $strategy ?: 'asc';
  }

  /**
   * Adds 'ORDER BY' to query builder.
   *
   * @param CriteriaScopes|\Illuminate\Database\Eloquent\Builder $builder
   * @return CriteriaScopes|\App\Query\EloquentBuilder|\Illuminate\Database\Eloquent\Builder
   */
  public function apply($builder) {
    return $builder->when(!empty($this->column), function($builder) {
      /* @var CriteriaScopes|\Illuminate\Database\Eloquent\Builder $builder */
      return $builder->orderByParams($this->column, $this->strategy ?: 'asc');
    });
  }
}