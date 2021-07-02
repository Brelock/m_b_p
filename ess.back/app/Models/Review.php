<?php

namespace App\Models;

use App\Enums\DirectoriesStorage;
use App\Models\Helpers\AssetFileAttribute;
use App\Models\Helpers\CriteriaActions;
use App\Models\Helpers\ReorderRecord;
use App\Models\Mixins\ReviewMixin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class Review
 * @package App\Models
 *
 * @property integer $id
 * @property integer $type
 * @property string $title
 * @property string $text_ru
 * @property string $text_uk
 * @property string $author_name_ru
 * @property string $author_name_uk
 * @property string $work_url
 * @property string $video_url
 * @property string $picture_file_name
 * @property integer $display_order
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 */
class Review extends Model {
  use CriteriaActions, ReorderRecord, AssetFileAttribute, ReviewMixin;
  /**
   * @var string
   */
  protected  $table = 'reviews';

  /**
   * @var string[]
   */
  protected $fillable = [
    'title',
    'type',
    'text_ru',
    'text_uk',
    'author_name_ru',
    'author_name_uk',
    'work_url',
    'video_url',
    'picture_file_name',
    'display_order',
  ];

  /**
   * @var string[]
   */
  protected $casts = [
    'title' => 'string',
    'type' => 'integer',
    'text_ru' => 'string',
    'text_uk' => 'string',
    'author_name_ru' => 'string',
    'author_name_uk' => 'string',
    'work_url' => 'string',
    'video_url' => 'string',
    'picture_file_name' => 'string',
    'display_order' => 'integer',
  ];

  /**
   * @return string
   */
  public function directoryStorage(): string {
    return DirectoriesStorage::REVIEWS_PICTURE_PATH;
  }
}
