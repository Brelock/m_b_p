<?php

namespace App\Criteria\Seo;

use App\Criteria\ICriteria;
use App\Models\Scopes\CriteriaScopes;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

/**
 * Criteria for filtering seo items by redirect uri.
 *
 * @package App\Criteria\Seo
 */
class WhereRedirectUri implements ICriteria {
  /**
   * @var string
   */
  public $redirectUri;

  /**
   * WhereRedirectUri constructor.
   *
   * @param string $redirectUri
   */
  public function __construct(string $redirectUri) {
    $this->redirectUri = $redirectUri;
  }

  /**
   * Add a basic where clause to the query.
   *
   * @param CriteriaScopes|EloquentBuilder|QueryBuilder $builder
   * @return CriteriaScopes|EloquentBuilder|QueryBuilder
   */
  public function apply($builder) {
    return $builder->where($builder->withAlias('redirect_uri'), '=', $this->redirectUri);
  }
}