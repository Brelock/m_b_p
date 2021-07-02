<?php

namespace App\Models;

use App\Enums\DirectoriesStorage;
use App\Models\Helpers\AssetFileAttribute;
use App\Models\Helpers\ReorderRecord;
use App\Models\Mixins\PictureMixin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class ProductPicture
 * @package App\Models
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $picture_name
 * @property string $thumb_name
 * @property integer $display_order
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Project $project
 */
class ProductPicture extends Model {
	use AssetFileAttribute, ReorderRecord, PictureMixin;
	/**
	 * @var string
	 */
	protected $table = 'product_pictures';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'product_id',
		'picture_name',
		'thumb_name',
		'display_order',
	];

	/**
	 * The attribute provides a convenient method of converting attributes to common data types
	 *
	 * @var array
	 */
	protected $casts = [
		'product_id' => 'integer',
		'picture_name' => 'string',
		'thumb_name' => 'string',
		'display_order' => 'integer',
	];

	/**
	 * @return string
	 */
	public function directoryStorage(): string {
		return DirectoriesStorage::PRODUCT_PICTURE_PATH;
	}

	/**
	 * Get a project for the picture
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function product() {
		return $this->belongsTo(Product::class, 'product_id', 'id');
	}

	/**
	 * @param string $fileName
	 * @return string
	 */
	public function getFilePath(string $fileName) {
		return $this->directoryStorage()."/{$fileName}";
	}
}
