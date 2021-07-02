<?php

namespace App\Models;

use App\Enums\DirectoriesStorage;
use App\Models\Helpers\AssetFileAttribute;
use App\Models\Helpers\CriteriaActions;
use App\Models\Helpers\ReorderRecord;
use App\Models\Scopes\FileUnloadScopes;
use App\Query\EloquentBuilder as Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class FileUnload
 * @package App\Models
 *
 * @property integer $id
 * @property string $title
 * @property string $file_url
 * @property string $file_name
 * @property string $description
 * @property Carbon $date_unloaded
 * @property integer $format
 * @property string $icon_name
 * @property string $icon_title
 * @property integer $quantity
 * @property integer $display_order
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class FileUnload extends Model {
  use CriteriaActions, FileUnloadScopes, AssetFileAttribute, ReorderRecord;

  /**
   * @var string
   */
  protected $table = 'file_unloads';

  /**
   * @var array
   */
  protected $fillable = [
    'title',
    'file_url',
    'file_name',
    'description',
    'date_unloaded',
    'format',
    'icon_name',
    'icon_title',
    'quantity',
	  'display_order'
  ];

	/**
	 * @return string
	 */
	public function directoryStorage(): string {
		return DirectoriesStorage::XLS_FILE_PATH;
	}

  /**
   * @param  Builder $query
   * @param  string $value
   * @return string
   */
  protected function getFullTextSearchColumn($query, $value) {
    return 'title';
  }
}
