<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

/**
 * Trait OrderProductScopes
 * @package App\Models\Scopes
 *
 * @method static Builder|self whereOrderId(int $orderId)
 */
trait OrderProductScopes {
  /**
   * @param self|Builder $query the eloquent builder.
   * @param int $orderId
   *
   * @return self|Builder
   */
  public function scopeWhereOrderId($query, int $orderId) {
    return $query->where($query->withAlias('order_id'), $orderId);
  }
}