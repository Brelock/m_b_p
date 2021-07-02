<?php

namespace App\Models;

use App\Enums\DirectoriesStorage;
use App\Models\Helpers\AssetFileAttribute;
use App\Models\Helpers\CriteriaActions;
use App\Models\Mixins\NewsMixin;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * Class News
 * @package App\Models
 *
 * @property integer $id
 * @property string $alias
 * @property string $title_uk
 * @property string $title_ru
 * @property string $text_uk
 * @property string $text_ru
 * @property boolean $is_published
 * @property Carbon $publication_date
 * @property string $seo_title_uk
 * @property string $seo_title_ru
 * @property string $seo_description_uk
 * @property string $seo_description_ru
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 *
 * @property NewsPicture[]|Collection $pictures
 * @property NewsPicture $picture
 * @property NewsPicture $mainPicture
 */
class News extends Model {
	use Sluggable, CriteriaActions, AssetFileAttribute, NewsMixin, SoftDeletes;

	const IS_PUBLISHED = 1;
	const IS_MAIN = 1;

	/**
	 * @var string
	 */
	protected $table = 'news';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'alias',
		'title_uk',
		'title_ru',
		'text_uk',
		'text_ru',
		'is_published',
		'publication_date',
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
		'title_uk' => 'string',
		'title_ru' => 'string',
		'text_uk' => 'string',
		'text_ru' => 'string',
		'is_published' => 'boolean',
		'seo_title_uk' => 'string',
		'seo_title_ru' => 'string',
		'seo_description_uk' => 'string',
		'seo_description_ru' => 'string',
	];

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = [
		'publication_date',
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
	 * @return string
	 */
	public function directoryStorage(): string {
		return DirectoriesStorage::NEWS_PICTURE_PATH;
	}

	/**
	 * Get pictures for the project
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function pictures() {
		return $this
			->hasMany(NewsPicture::class, 'news_id', 'id')
			->orderBy('display_order');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function picture() {
		return $this
			->hasOne(NewsPicture::class, 'news_id', 'id')
			->where('is_main', '!=', self::IS_MAIN);
	}

	/**
	 * Get main picture for the project
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function mainPicture() {
		return $this
			->hasOne(NewsPicture::class, 'news_id', 'id')
			->where('is_main', '=', self::IS_MAIN);
	}
}
