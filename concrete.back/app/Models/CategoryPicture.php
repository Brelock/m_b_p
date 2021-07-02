<?php

namespace App\Models;

use App\Enums\DirectoriesStorage;
use App\Models\Helpers\AssetFileAttribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class CategoryPicture
 * @package App\Models
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $file_name
 * @property integer $type
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Category $category
 */
class CategoryPicture extends Model {
	use AssetFileAttribute;
	/**
	 * @var string
	 */
	protected $table = 'category_pictures';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'category_id',
		'file_name',
		'type',
	];

	/**
	 * The attribute provides a convenient method of converting attributes to common data types
	 *
	 * @var array
	 */
	protected $casts = [
		'category_id' => 'integer',
		'file_name' => 'string',
		'type' => 'integer',
	];

	/**
	 * @return string
	 */
	public function directoryStorage(): string {
		return DirectoriesStorage::CATEGORY_PICTURE_PATH;
	}

	/**
	 * Get a category for the category picture.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function category() {
		return $this->belongsTo(Category::class, 'category_id', 'id');
	}

}
