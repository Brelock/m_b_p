<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

/**
 * Trait ProductPictureScopes
 * @package App\Models\Scopes
 *
 * @method static Builder|self onlyWithoutThumbnail()
 */
trait ProductPictureScopes {
  /**
   * @param self|Builder $query the eloquent builder.
   *
   * @return self|Builder
   */
  public function scopeOnlyWithoutThumbnail($query) {
    return $query->where(function($builder) {
      /* @var Builder $builder */
      return $builder
        ->whereNotNull('thumbnail_name')
        ->orWhere('thumbnail_name', '<>', '');
    });
  }
}