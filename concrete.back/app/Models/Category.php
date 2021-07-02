<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class Category
 * @package App\Models
 *
 * @property integer $id
 * @property string $title
 * @property string $formula
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property CategoryPicture[]|Collection $pictures
 * @property Result[]|Collection $results
 */
class Category extends Model {
	/**
	 * @var string
	 */
	protected $table = 'categories';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'title',
		'formula',
	];

	/**
	 * The attribute provides a convenient method of converting attributes to common data types
	 *
	 * @var array
	 */
	protected $casts = [
		'title' => 'string',
		'formula' => 'string',
	];

	/**
	 * Get pictures for the category
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function pictures() {
		return $this->hasMany(CategoryPicture::class, 'category_id', 'id');
	}

	/**
	 * Get results for the category
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function results() {
		return $this->hasMany(Result::class, 'category_id', 'id');
	}
}
