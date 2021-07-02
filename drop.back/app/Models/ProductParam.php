<?php

namespace App\Models;

use App\Models\Helpers\CriteriaActions;
use App\Models\Mixins\ProductParamMixin;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductParam
 * @package App\Models
 *
 * @property integer $product_id
 * @property integer $param_id
 * @property integer $param_value_id
 *
 * @property Product $product
 * @property Param $param
 * @property ParamValue $paramValue
 */
class ProductParam extends Model {
  use CriteriaActions, ProductParamMixin;

  /**
   * @var string
   */
  protected $table = 'product_param';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array $fillable
	 */
	protected $fillable = [
		'product_id',
		'param_id',
		'param_value_id'
	];

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function product() {
    return $this->belongsTo(Product::class, 'product_id', 'id');
  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function param() {
    return $this->belongsTo(Param::class, 'param_id', 'id');
  }

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
  public function paramValue() {
  	return $this->belongsTo(ParamValue::class, 'param_value_id', 'id');
  }
}
