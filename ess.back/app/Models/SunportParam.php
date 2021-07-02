<?php

namespace App\Models;


use App\Models\Helpers\ReorderRecord;
use App\Models\Mixins\SunportParamMixin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class SunportParam
 * @package App\Models
 *
 * @property integer $id
 * @property integer $sunport_id
 * @property string $title_uk
 * @property string $title_ru
 * @property string $value_uk
 * @property string $value_ru
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 */
class SunportParam extends Model {
	/**
	 * @var string
	 */
	protected $table = 'sunport_params';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'sunport_id',
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
		'sunport_id' => 'integer',
		'title_uk' => 'string',
		'title_ru' => 'string',
		'value_uk' => 'string',
		'value_ru' => 'string',
	];

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
	public function sunport() {
		return $this->belongsTo(Sunport::class, 'sunport_id', 'id');
	}

}
