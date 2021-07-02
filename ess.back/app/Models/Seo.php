<?php

namespace App\Models;

use App\Models\Helpers\CriteriaActions;
use App\Models\Mixins\SeoMixin;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class Seo
 * @package App\Models
 *
 * @property integer $id
 * @property string $redirect_uri
 * @property string $title_uk
 * @property string $title_ru
 * @property string $description_uk
 * @property string $description_ru
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Seo extends Model {
	use CriteriaActions, SeoMixin;
	/**
	 * @var string
	 */
	protected $table = 'seo';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'redirect_uri',
		'title_uk',
		'title_ru',
		'description_uk',
		'description_ru',
	];

	/**
	 * The attribute provides a convenient method of converting attributes to common data types
	 *
	 * @var array
	 */
	protected $casts = [
		'redirect_uri' => 'string',
		'title_uk' => 'string',
		'title_ru' => 'string',
		'description_uk' => 'string',
		'description_ru' => 'string',
	];


}
