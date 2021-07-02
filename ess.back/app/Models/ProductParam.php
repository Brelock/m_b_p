<?php

namespace App\Models;


use App\Models\Helpers\ReorderRecord;
use App\Models\Mixins\ProductParamMixin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class ProductParam
 * @package App\Models
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $title_uk
 * @property string $title_ru
 * @property string $value_uk
 * @property string $value_ru
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Project $project
 */
class ProductParam extends Model {
	use  ReorderRecord, ProductParamMixin;
	/**
	 * @var string
	 */
	protected $table = 'product_params';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'product_id',
		'title_uk',
		'title_ru',
		'value_uk',
		'value_ru',
	];

	/**
	 * The attribute provides a convenient method of converting attributes to common data types
	 *
	 * @var array
	 */
	protected $casts = [
		'product_id' => 'integer',
		'title_uk' => 'string',
		'title_ru' => 'string',
		'value_uk' => 'string',
		'value_ru' => 'string',
	];

	/**
	 * Get a project for the picture
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function product() {
		return $this->belongsTo(Product::class, 'product_id', 'id');
	}

}
