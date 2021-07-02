<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

/**
 * Trait FileUnloadScopes
 * @package App\Models\Scopes
 *
 * @method static Builder onlyXML()
 * @method static Builder onlyXLS()
 */
trait FileUnloadScopes {
  /**
   * @param Builder $query
   *
   * @return Builder
   */
  public function scopeOnlyXML($query) {
    return $query->whereNull('file_name');
  }

  /**
   * @param Builder $query
   *
   * @return Builder
   */
  public function scopeOnlyXLS($query) {
    return $query->whereNotNull('file_name');
  }
}