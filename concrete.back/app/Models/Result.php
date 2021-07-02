<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class Result
 * @package App\Models
 *
 * @property integer $id
 * @property integer $category_id
 * @property float $length
 * @property float $width
 * @property float $height
 * @property float $diameter
 * @property float $depth
 * @property integer $quantity
 * @property float $result
 * @property string $formula
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Category $category
 */
class Result extends Model {
	/**
	 * @var string
	 */
	protected $table = 'results';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'category_id',
		'length',
		'width',
		'height',
		'diameter',
		'depth',
		'quantity',
		'result',
	];

	/**
	 * The attribute provides a convenient method of converting attributes to common data types
	 *
	 * @var array
	 */
	protected $casts = [
		'category_id' => 'integer',
		'length' => 'float',
		'width' => 'float',
		'height' => 'float',
		'diameter' => 'float',
		'depth' => 'float',
		'quantity' => 'integer',
		'result' => 'float',
	];

	/**
	 * Get category for the result
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function category() {
		return $this->belongsTo(Category::class, 'category_id', 'id');
	}
}
