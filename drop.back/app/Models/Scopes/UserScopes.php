<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

/**
 * Trait UserScopes
 * @package App\Models\Scopes
 *
 * @method Builder|self whereEmail(string $email)
 */
trait UserScopes {
  /**
   * @param self|Builder $query the eloquent builder.
   * @param string $email
   *
   * @return self|Builder
   */
  public function scopeWhereEmail($query, string $email) {
    return $query->where($query->withAlias('email'), $email);
  }
}