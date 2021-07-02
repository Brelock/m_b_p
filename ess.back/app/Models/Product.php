<?php

namespace App\Models;

use App\Enums\DirectoriesStorage;
use App\Models\Helpers\AssetFileAttribute;
use App\Models\Helpers\CriteriaActions;
use App\Models\Helpers\ReorderRecord;
use App\Models\Mixins\ProductMixin;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * Class Product
 * @package App\Models
 *
 * @property integer $id
 * @property string $alias
 * @property string $title_uk
 * @property string $title_ru
 * @property float $price
 * @property string $xls_file_name
 * @property string $sub_description_uk
 * @property string $sub_description_ru
 * @property integer $type
 * @property string $seo_title_uk
 * @property string $seo_title_ru
 * @property string $seo_description_uk
 * @property string $seo_description_ru
 * @property integer $display_order
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 *
 * @property ProductPicture[]|Collection $pictures
 */
class Product extends Model {
	use SoftDeletes, Sluggable, ReorderRecord, CriteriaActions, AssetFileAttribute, ProductMixin;

//  const IS_KNESS = 1;

	/**
	 * @var string
	 */
	protected $table = 'products';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'alias',
		'title_uk',
		'title_ru',
		'price',
		'xls_file_name',
		'sub_description_uk',
		'sub_description_ru',
		'type',
		'seo_title_uk',
		'seo_title_ru',
		'seo_description_uk',
		'seo_description_ru',
    'display_order',
	];

	/**
	 * The attribute provides a convenient method of converting attributes to common data types
	 *
	 * @var array
	 */
	protected $casts = [
		'alias' => 'string',
		'title_uk' => 'string',
		'title_ru' => 'string',
		'price' => 'float',
		'xls_file_name' => 'string',
		'sub_description_uk' => 'string',
		'sub_description_ru' => 'string',
    'type' => 'integer',
		'seo_title_uk' => 'string',
		'seo_title_ru' => 'string',
		'seo_description_uk' => 'string',
		'seo_description_ru' => 'string',
    'display_order' => 'integer',
	];

  /**
   * @return string
   */
  public function directoryStorage(): string {
    return DirectoriesStorage::PRODUCT_XLS_FILE_PATH;
  }

	/**
	 * Generate an alias
	 *
	 * @return array|\string[][]
	 */
	public function sluggable(): array {
		return [
			'alias' => [
				'source' => 'title_uk',
			],
		];
	}

	/**
	 * Get pictures for the product
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function pictures() {
		return $this
			->hasMany(ProductPicture::class, 'product_id', 'id')
			->orderBy('display_order');
	}

	/**
	 * Get params for the product
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function params() {
		return $this
			->hasMany(ProductParam::class, 'product_id', 'id');
	}

}
