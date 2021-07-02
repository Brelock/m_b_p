<?php

namespace App\Models;

use App\Models\Helpers\CriteriaActions;
use App\Models\Helpers\ReorderRecord;
use App\Models\Mixins\ProjectMixin;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * Class Project
 * @package App\Models
 *
 * @property integer $id
 * @property string $alias
 * @property boolean $is_main
 * @property string $title_uk
 * @property string $title_ru
 * @property string $address_uk
 * @property string $address_ru
 * @property string $options_uk
 * @property string $options_ru
 * @property string $exploitation_uk
 * @property string $exploitation_ru
 * @property integer $display_order
 * @property string $seo_title_uk
 * @property string $seo_title_ru
 * @property string $seo_description_uk
 * @property string $seo_description_ru
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 *
 * @property ProjectPicture[]|Collection $pictures
 * @property ProjectPicture $mainPicture
 */
class Project extends Model {
	use SoftDeletes, Sluggable, ReorderRecord, CriteriaActions, ProjectMixin;

	const IS_MAIN = 1;

	/**
	 * @var string
	 */
	protected $table = 'projects';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'alias',
    'is_main',
		'title_uk',
		'title_ru',
		'address_uk',
		'address_ru',
		'options_uk',
		'options_ru',
		'exploitation_uk',
		'exploitation_ru',
		'display_order',
		'seo_title_uk',
		'seo_title_ru',
		'seo_description_uk',
		'seo_description_ru',
	];

	/**
	 * The attribute provides a convenient method of converting attributes to common data types
	 *
	 * @var array
	 */
	protected $casts = [
		'alias' => 'string',
    'is_main' => 'boolean',
		'title_uk' => 'string',
		'title_ru' => 'string',
		'address_uk' => 'string',
		'address_ru' => 'string',
		'options_uk' => 'string',
		'options_ru' => 'string',
		'exploitation_uk' => 'string',
		'exploitation_ru' => 'string',
		'display_order' => 'integer',
		'seo_title_uk' => 'string',
		'seo_title_ru' => 'string',
		'seo_description_uk' => 'string',
		'seo_description_ru' => 'string',
	];

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
	 * Get pictures for the project
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function pictures() {
		return $this
			->hasMany(ProjectPicture::class, 'project_id', 'id')
      ->where('is_main', '!=', self::IS_MAIN)
			->orderBy('display_order');
	}

	/**
	 * Get main picture for the project
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function mainPicture() {
		return $this
			->hasOne(ProjectPicture::class, 'project_id', 'id')
			->where('is_main', '=', self::IS_MAIN);
	}
}
