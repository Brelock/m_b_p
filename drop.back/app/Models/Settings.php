<?php

namespace App\Models;

use App\Models\Helpers\SingletonModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class Settings
 * @package App\Models
 *
 * @property int $id
 * @property string $novaposhta_sender_ref
 * @property string $novaposhta_sender_contact_ref
 * @property string $novaposhta_sender_phone_number
 * @property int $novaposhta_sender_city_id
 * @property int $novaposhta_sender_warehouse_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property NovaPoshtaCity $novaPoshtaCity
 * @property NovaPoshtaWarehouse $novaPoshtaWarehouse
 */
class Settings extends Model {
  use SingletonModel;

  /**
   * @var string
   */
  protected $table = 'settings';

  /**
   * @var array
   */
  protected $fillable = [
    'novaposhta_sender_ref',
    'novaposhta_sender_contact_ref',
    'novaposhta_sender_phone_number',
    'novaposhta_sender_city_id',
    'novaposhta_sender_warehouse_id',
  ];

  /**
   * @var array
   */
  protected $casts = [
    'novaposhta_sender_ref' => 'string',
    'novaposhta_sender_contact_ref' => 'string',
    'novaposhta_sender_phone_number' => 'string',
    'novaposhta_sender_city_id' => 'int',
    'novaposhta_sender_warehouse_id' => 'int',
  ];

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function novaPoshtaCity() {
    return $this->belongsTo(NovaPoshtaCity::class, 'novaposhta_sender_city_id', 'id');
  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function novaPoshtaWarehouse() {
    return $this->belongsTo(NovaPoshtaWarehouse::class, 'novaposhta_sender_warehouse_id', 'id');
  }
}
