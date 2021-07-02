<?php

namespace App\Models;

use App\Models\Helpers\CriteriaActions;
use App\Models\Mixins\NovaPoshta\NovaPoshtaCityMixin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

/**
 * Class NovaPoshtaCity
 * @package App\Models
 *
 * @property string $description_en
 * @property string $description_ru
 * @property string $description_uk
 * @property string $ref
 * @property string $delivery1
 * @property string $delivery2
 * @property string $delivery3
 * @property string $delivery4
 * @property string $delivery5
 * @property string $delivery6
 * @property string $delivery7
 * @property string $area
 * @property string $settlement_type
 * @property string $is_branch
 * @property string $prevent_entry_new_streets_user
 * @property string $conglomerates
 * @property string $city_id
 * @property string $settlement_type_description_ru
 * @property string $settlement_type_description_uk
 * @property Carbon created_at
 * @property Carbon updated_at
 *
 * @property Order[]|Collection $orders
 * @property NovaPoshtaWarehouse[]|Collection $novaPoshtaWarehouses
 */
class NovaPoshtaCity extends Model {
  use CriteriaActions, NovaPoshtaCityMixin;

  /**
   * @var string
   */
  protected $table = 'novaposhta_city';

  /**
   * The attributes that are mass assignable.
   *
   * @var array $fillable
   */
  protected $fillable = [
    'description_en',
    'description_ru',
    'description_uk',
    'ref',
    'delivery1',
    'delivery2',
    'delivery3',
    'delivery4',
    'delivery5',
    'delivery6',
    'delivery7',
    'area',
    'settlement_type',
    'is_branch',
    'prevent_entry_new_streets_user',
    'conglomerates',
    'city_id',
    'settlement_type_description_ru',
    'settlement_type_description_uk',
  ];

  /**
   * @var array
   */
  protected $casts = [
    'description_en' => 'string',
    'description_ru' => 'string',
    'description_uk' => 'string',
    'ref' => 'string',
    'delivery1' => 'string',
    'delivery2' => 'string',
    'delivery3' => 'string',
    'delivery4' => 'string',
    'delivery5' => 'string',
    'delivery6' => 'string',
    'delivery7' => 'string',
    'area' => 'string',
    'settlement_type' => 'string',
    'is_branch' => 'string',
    'prevent_entry_new_streets_user' => 'string',
    'conglomerates' => 'string',
    'city_id' => 'string',
    'settlement_type_description_ru' => 'string',
    'settlement_type_description_uk' => 'string',
  ];

  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function orders() {
    return $this->hasMany(Order::class, 'novaposhta_city_id', 'id');
  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function novaPoshtaWarehouses() {
    return $this->hasMany(NovaPoshtaWarehouse::class, 'city_id', 'id');
  }
}
