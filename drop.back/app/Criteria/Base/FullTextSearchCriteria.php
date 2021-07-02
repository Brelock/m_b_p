<?php

namespace App\Criteria\Base;

use App\Criteria\ICriteria;
use App\Models\Scopes\CriteriaScopes;

/**
 * Base criteria for fulltext search in items.
 *
 * @package App\Criteria\Base
 */
class FullTextSearchCriteria implements ICriteria {
  /**
   * Search key text.
   *
   * @var string $text
   */
  protected $text;

  /**
   * FullTextSearchCriteria constructor.
   *
   * @param string|null $text
   * @return void
   */
  public function __construct(string $text = null) {
    $this->text = $text;
  }

  /**
   * Adds a condition specifically described in the 'getFullTextSearchColumn' function of the model using the 'DefaultScoped' trait.
   *
   * @param CriteriaScopes|\Illuminate\Database\Query\Builder $builder
   * @return CriteriaScopes|\App\Query\EloquentBuilder|\Illuminate\Database\Query\Builder
   */
  public function apply($builder) {
    return $builder->fullTextSearch($this->text);
  }
}