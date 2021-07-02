<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

/**
 * Trait CategoryScopes
 * @package App\Models\Scopes
 *
 * @method Builder|self onlyChild()
 * @method Builder|self orderByIdAsc()
 */
trait CategoryScopes {
  /**
   * @param self|Builder $query the eloquent builder.
   *
   * @return self|Builder|CategoryScopes
   */
  public function scopeOnlyChild($query) {
    return $query->whereNotNull($query->withAlias('parent_id'));
  }

  /**
   * @param self|Builder $query the eloquent builder.
   *
   * @return self|Builder|CategoryScopes
   */
  public function scopeOrderByIdAsc($query) {
    return $query->orderBy($query->withAlias('id'), 'asc');
  }
}