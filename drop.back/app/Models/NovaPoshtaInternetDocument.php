<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use App\Models\Mixins\NovaPoshta\NovaPoshtaInternetDocument as NovaPoshtaInternetDocumentTrait;

/**
 * Class NovaPoshtaInternetDocument
 * @package App\Models
 *
 * @property integer $order_id
 * @property string $ttn
 * @property string $ref
 * @property float $cost
 * @property string $estimated_delivery_date
 * @property string $type_document
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Order $order
 */
class NovaPoshtaInternetDocument extends Model {
  use NovaPoshtaInternetDocumentTrait;

  /**
   * @var string
   */
  protected $table = 'novaposhta_internet_documents';

  /**
   * The attributes that are mass assignable.
   *
   * @var array $fillable
   */
  protected $fillable = [
    'order_id',
    'ttn',
    'ref',
    'cost',
    'estimated_delivery_date',
    'type_document',
  ];

  /**
   * @var array
   */
  protected $casts = [
    'order_id' => 'int',
    'ttn' => 'string',
    'ref' => 'string',
    'cost' => 'float',
    'estimated_delivery_date' => 'string',
    'type_document' => 'string',
  ];

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function order() {
    return $this->belongsTo(Order::class, 'order_id', 'id');
  }
}
