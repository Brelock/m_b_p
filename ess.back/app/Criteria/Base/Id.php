<?php

namespace App\Criteria\Base;

use App\Criteria\ICriteria;
use App\Models\Scopes\CriteriaScopes;

/**
 * Base criteria for search items by primary key.
 *
 * @package App\Criteria\Base
 */
class Id implements ICriteria {
  /**
   * @var int $id
   */
  public $id;

  /**
   * Id constructor.
   *
   * @param int $id
   * @return void
   */
  public function __construct(int $id) {
    $this->id = $id;
  }

  /**
   * Adds a condition 'WHERE `id` = :id'.
   *
   * @param CriteriaScopes|\Illuminate\Database\Eloquent\Builder $builder
   * @return CriteriaScopes|\Illuminate\Database\Eloquent\Builder
   */
  public function apply($builder) {
    return $builder->whereKey($this->id);
  }
}
