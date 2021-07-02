<?php

namespace App\Models;

use App\Collection\ParamValueCollection;
use App\Models\Helpers\CriteriaActions;
use App\Models\Mixins\ParamValueMixin;
use App\Query\EloquentBuilder as Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Class ParamValue
 * @package App\Models
 *

 * @property integer $id
 * @property integer $param_id
 * @property string $value
 *
 * @property ProductParam[]|Collection $productParams
 * @property Param $param
 */
class ParamValue extends Model {
  use CriteriaActions, ParamValueMixin;

  /**
   * @var string
   */
  protected $table = 'param_value';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array $fillable
	 */
	protected $fillable = [
		'param_id',
		'value'
	];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
  public function productParams() {
    return $this->hasMany(ProductParam::class, 'param_value_id', 'id');
  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function param() {
    return $this->belongsTo(Param::class, 'param_id', 'id');
  }

}
