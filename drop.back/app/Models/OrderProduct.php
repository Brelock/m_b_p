<?php

namespace App\Models;

use App\Models\Helpers\CriteriaActions;
use App\Models\Mixins\OrderProductMixin;
use App\Models\Scopes\OrderProductScopes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class OrderProduct
 * @package App\Models
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $product_id
 * @property integer $quantity
 * @property float $price_drop
 * @property float $price_trade
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Order $order
 * @property Product $product
 */
class OrderProduct extends Model {
  use CriteriaActions, OrderProductScopes, OrderProductMixin;

  /**
   * @var string
   */
  protected $table = 'order_product';

  /**
   * The attributes that are mass assignable.
   *
   * @var array $fillable
   */
  protected $fillable = [
    'order_id',
    'product_id',
    'quantity',
    'price_drop',
    'price_trade',
  ];

  /**
   * @var array
   */
  protected $casts = [
    'order_id' => 'int',
    'product_id' => 'int',
    'quantity' => 'int',
    'price_drop' => 'float',
    'price_trade' => 'float',
  ];

  /**
   * @var array
   */
  protected $attributes = [
    'quantity' => 1,
  ];

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function order() {
    return $this->belongsTo(Order::class, 'order_id', 'id');
  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function product() {
    return $this->belongsTo(Product::class, 'product_id', 'id');
  }
}
