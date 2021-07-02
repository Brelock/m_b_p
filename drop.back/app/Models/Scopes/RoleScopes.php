<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

/**
 * Trait RoleScopes
 * @package App\Models\Scopes
 *
 * @method static Builder whereDefaultRole(int $type)
 */
trait RoleScopes {
  /**
   * @param Builder $query
   * @param int $type
   *
   * @return Builder
   */
  public function scopeWhereDefaultRole($query, int $type) {
    return $query
      ->where('is_default', '=', 1)
      ->where('type', '=', $type);
  }
}