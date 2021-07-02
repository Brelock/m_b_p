<?php

namespace App\Models;


use App\Enums\DirectoriesStorage;
use App\Models\Helpers\AssetFileAttribute;
use App\Models\Helpers\ReorderRecord;
use App\Models\Mixins\SunportParamPictureMixin;
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
 * @property string $picture_file_name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 */
class SunportParamPicture extends Model {
	use  ReorderRecord, SunportParamPictureMixin, AssetFileAttribute;
	/**
	 * @var string
	 */
	protected $table = 'sunport_params_picture';

  /**
   * @return string
   */
  public function directoryStorage(): string {
    return DirectoriesStorage::SUNPORT_PARAM_FILE_PATH;
  }

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'sunport_id',
		'title_uk',
		'title_ru',
		'picture_file_name',
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
		'picture_file_name' => 'string',

	];

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
	public function sunport() {
		return $this->belongsTo(Sunport::class, 'sunport_id', 'id');
	}
}
