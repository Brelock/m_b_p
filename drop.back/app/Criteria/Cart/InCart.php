<?php

namespace App\Criteria\Cart;

use App\Criteria\ICriteria;
use App\Models\Scopes\CriteriaScopes;
use App\Models\Scopes\OrderScopes;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class InCart implements ICriteria {
  /**
   * Generated user hash stored for the duration of the session.
   *
   * @var string
   */
  private $cookieHash;

  /**
   * InCart constructor.
   *
   * @param string $cookieHash generated user hash stored for the duration of the session
   * @return void
   */
  public function __construct(string $cookieHash) {
    $this->cookieHash = $cookieHash;
  }

  /**
   * Adds a condition 'WHERE is_generated = 0 AND cookie_hash = :hash'.
   *
   * @param CriteriaScopes|EloquentBuilder|QueryBuilder|OrderScopes $builder
   * @return CriteriaScopes|EloquentBuilder|QueryBuilder|OrderScopes
   */
  public function apply($builder) {
    return $builder->whereCookieHash($this->cookieHash);
  }
}