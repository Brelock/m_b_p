<?php

namespace App\Models;

use App\Models\Helpers\CriteriaActions;
use App\Models\Mixins\NovaPoshta\NovaPoshtaWarehouseMixin;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class NovaPoshtaWarehouse
 * @package App\Models
 *
 * @property integer $city_id
 * @property string $site_key
 * @property string $description_uk
 * @property string $description_ru
 * @property string $short_address_uk
 * @property string $short_address_ru
 * @property string $phone
 * @property string $type_of_warehouse
 * @property string $ref
 * @property string $number
 * @property string $city_ref
 * @property string $city_description_uk
 * @property string $city_description_ru
 * @property string $longitude
 * @property string $latitude
 * @property string $post_finance
 * @property string $bicycle_parking
 * @property string $payment_access
 * @property string $pos_terminal
 * @property string $international_shipping
 * @property string $total_max_weight_allowed
 * @property string $place_max_weight_allowed
 * @property Carbon created_at
 * @property Carbon updated_at
 *
 * @property Order[]|Collection $orders
 * @property NovaPoshtaCity $novaPoshtaCity
 */
class NovaPoshtaWarehouse extends Model {
  use CriteriaActions, NovaPoshtaWarehouseMixin;

  /**
   * @var string
   */
  protected $table = 'novaposhta_warehouse';

  /**
   * The attributes that are mass assignable.
   *
   * @var array $fillable
   */
  protected $fillable = [
    'city_id',
    'site_key',
    'description_uk',
    'description_ru',
    'short_address_uk',
    'short_address_ru',
    'phone',
    'type_of_warehouse',
    'ref',
    'number',
    'city_ref',
    'city_description_uk',
    'city_description_ru',
    'longitude',
    'latitude',
    'post_finance',
    'bicycle_parking',
    'payment_access',
    'pos_terminal',
    'international_shipping',
    'total_max_weight_allowed',
    'place_max_weight_allowed',
  ];

  /**
   * @var array
   */
  protected $casts = [
    'city_id' => 'int',
    'site_key' => 'string',
    'description_uk' => 'string',
    'description_ru' => 'string',
    'short_address_uk' => 'string',
    'short_address_ru' => 'string',
    'phone' => 'string',
    'type_of_warehouse' => 'string',
    'ref' => 'string',
    'number' => 'string',
    'city_ref' => 'string',
    'city_description_uk' => 'string',
    'city_description_ru' => 'string',
    'longitude' => 'string',
    'latitude' => 'string',
    'post_finance' => 'string',
    'bicycle_parking' => 'string',
    'payment_access' => 'string',
    'pos_terminal' => 'string',
    'international_shipping' => 'string',
    'total_max_weight_allowed' => 'string',
    'place_max_weight_allowed' => 'string',
  ];

  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function orders() {
    return $this->hasMany(Order::class, 'novaposhta_warehouse_id', 'id');
  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function novaPoshtaCity() {
    return $this->belongsTo(NovaPoshtaCity::class, 'city_id', 'id');
  }
}
