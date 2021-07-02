<?php

namespace App\Models\Scopes;

use App\Enums\OrderStatuses;
use Illuminate\Database\Eloquent\Builder;

/**
 * Trait OrderScopes
 * @package App\Models\Scopes
 *
 * @method static Builder|self whereCookieHash(string $hash)
 * @method static Builder|self onlyActive()
 * @method static Builder|self onlyArchived()
 */
trait OrderScopes {
  /**
   * @param self|Builder $query the eloquent builder.
   * @param string $hash
   *
   * @return self|Builder
   */
  public function scopeWhereCookieHash($query, string $hash) {
    return $query->where($query->withAlias('cookie_hash'), $hash);
  }

  /**
   * @param  self|Builder $query the eloquent builder.
   * @return self|Builder
   */
  public function scopeOnlyActive($query) {
    return $query->where($query->withAlias('status'), OrderStatuses::ACTIVE);
  }

  /**
   * @param  self|Builder $query the eloquent builder.
   * @return self|Builder
   */
  public function scopeOnlyArchived($query) {
    return $query->where($query->withAlias('status'), OrderStatuses::ARCHIVE);
  }
}