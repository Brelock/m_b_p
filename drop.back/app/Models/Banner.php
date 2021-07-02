<?php

namespace App\Models;

use App\Enums\DirectoriesStorage;
use App\Models\Helpers\CriteriaActions;
use App\Models\Helpers\ReorderRecord;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use App\Models\Helpers\AssetFileAttribute;

/**
 * Class Banner
 * @package App\Models
 *
 * @property integer $id
 * @property string $picture_file_name
 * @property string $url
 * @property integer $display_order
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Banner extends Model {
	use CriteriaActions, ReorderRecord, AssetFileAttribute;

	/**
	 * @var string
	 */
	protected $table = 'banners';

	/**
	 * @var array
	 */
	protected $fillable = [
		'picture_file_name',
		'url',
		'display_order',
	];

	/**
	 * @var array
	 */
	protected $casts = [
		'picture_file_name' => 'string',
		'url' => 'string',
		'display_order' => 'integer',
	];

	/**
	 * @return string
	 */
	public function directoryStorage(): string {
		return DirectoriesStorage::BANNER_FILE_PATH;
	}

	/**
	 * @param Builder $query
	 * @param string $value
	 * @return string
	 */
	protected function getFullTextSearchColumn($query, $value) {
		return 'picture_file_name';
	}

}
