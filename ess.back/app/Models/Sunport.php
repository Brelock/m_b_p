<?php

namespace App\Models;

use App\Enums\DirectoriesStorage;
use App\Models\Helpers\AssetFileAttribute;
use App\Models\Helpers\CriteriaActions;
use App\Models\Helpers\ReorderRecord;
use App\Models\Mixins\SunportMixin;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * Class Sunport
 * @package App\Models
 *
 * @property integer $id
 * @property string $alias
 * @property string $title_uk
 * @property string $title_ru
 * @property integer $price
 * @property string $xls_file_name
 * @property string $sub_title_uk
 * @property string $sub_title_ru
 * @property string $seo_title_uk
 * @property string $seo_title_ru
 * @property string $picture_file_name
 * @property integer $display_order
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 *
 * @property SunportParam[]|Collection $params
 * @property SunportParamPicture[]|Collection $paramsPicture
 */
class Sunport extends Model {
	use SoftDeletes, Sluggable, ReorderRecord, CriteriaActions, AssetFileAttribute, SunportMixin;

	/**
	 * @var string
	 */
	protected $table = 'sunports';

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
		'sub_title_uk',
		'sub_title_ru',
		'seo_title_uk',
		'seo_title_ru',
		'picture_file_name',
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
		'price' => 'integer',
		'xls_file_name' => 'string',
		'sub_title_uk' => 'string',
		'sub_title_ru' => 'string',
		'seo_title_uk' => 'string',
		'seo_title_ru' => 'string',
		'picture_file_name' => 'string',
    'display_order' => 'integer',
	];

  /**
   * @return string
   */
  public function directoryStorage(): string {
    return DirectoriesStorage::SUNPORT_FILE_PATH;
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
	 * Get params for the sunport
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function params() {
		return $this
			->hasMany(SunportParam::class, 'sunport_id', 'id');
	}

	/**
	 * Get params picture for the sunport
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function paramsPicture() {
		return $this
			->hasMany(SunportParamPicture::class, 'sunport_id', 'id');
	}
}
