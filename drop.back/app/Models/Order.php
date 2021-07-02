<?php

namespace App\Models;

use App\Collection\OrderProductCollection;
use App\Collection\ProductCollection;
use App\Models\Helpers\CriteriaActions;
use App\Models\Scopes\OrderScopes;
use App\Models\Mixins\OrderMixin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class Order
 * @package App\Models
 *
 * @property int $id
 * @property int $user_id
 * @property string $cookie_hash
 * @property int $status
 * @property string $dropshipper_full_name
 * @property string $dropshipper_phone_number
 * @property int $payment_type
 * @property int $delivery_type
 * @property string $delivery_general_info
 * @property string $novaposhta_first_name
 * @property string $novaposhta_middle_name
 * @property string $novaposhta_last_name
 * @property string $novaposhta_phone_number
 * @property int $novaposhta_city_id
 * @property int $novaposhta_warehouse_id
 * @property float $total_amount
 * @property float $amount_cash_delivery
 * @property float $amount_dropshipper_earnings
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property string $novaposhta_full_name
 * @property string $novaposhta_location
 *
 * @property User $user
 * @property NovaPoshtaCity $novaPoshtaCity
 * @property NovaPoshtaWarehouse $novaPoshtaWarehouse
 * @property OrderProduct[]|OrderProductCollection $orderProducts
 * @property NovaPoshtaInternetDocument $novaPoshtaInternetDocument
 * @property Product[]|ProductCollection $products
 */
class Order extends Model {
  use CriteriaActions, OrderScopes, OrderMixin;

  /**
   * @var string
   */
  protected $table = 'orders';

  /**
   * The attributes that are mass assignable.
   *
   * @var array $fillable
   */
  protected $fillable = [
    'user_id',
    'cookie_hash',
    'status',
    'dropshipper_full_name',
    'dropshipper_phone_number',
    'payment_type',
    'delivery_type',
    'delivery_general_info',
    'novaposhta_first_name',
    'novaposhta_middle_name',
    'novaposhta_last_name',
    'novaposhta_phone_number',
    'novaposhta_city_id',
    'novaposhta_warehouse_id',
  ];

  /**
   * @var array
   */
  protected $casts = [
    'user_id' => 'int',
    'cookie_hash' => 'string',
    'status' => 'int',
    'dropshipper_full_name' => 'string',
    'dropshipper_phone_number' => 'string',
    'payment_type' => 'int',
    'delivery_type' => 'int',
    'delivery_general_info' => 'string',
    'novaposhta_first_name' => 'string',
    'novaposhta_middle_name' => 'string',
    'novaposhta_last_name' => 'string',
    'novaposhta_phone_number' => 'string',
    'novaposhta_city_id' => 'int',
    'novaposhta_warehouse_id' => 'int',
    'total_amount' => 'float',
    'amount_cash_delivery' => 'float',
    'amount_dropshipper_earnings' => 'float',
  ];

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function user() {
    return $this->belongsTo(User::class, 'user_Id', 'id');
  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function novaPoshtaCity() {
    return $this->belongsTo(NovaPoshtaCity::class, 'novaposhta_city_id', 'id');
  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function novaPoshtaWarehouse() {
    return $this->belongsTo(NovaPoshtaWarehouse::class, 'novaposhta_warehouse_id', 'id');
  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function orderProducts() {
    return $this->hasMany(OrderProduct::class, 'order_id', 'id');
  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function novaPoshtaInternetDocument() {
    return $this->hasOne(NovaPoshtaInternetDocument::class, 'order_id', 'id');
  }
}
