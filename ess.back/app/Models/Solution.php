<?php

namespace App\Models;

use App\Enums\DirectoriesStorage;
use App\Models\Helpers\AssetFileAttribute;
use App\Models\Helpers\CriteriaActions;
use App\Models\Helpers\ReorderRecord;
use App\Models\Mixins\SolutionMixin;
use Cviebrock\EloquentSluggable\Sluggable;
use \Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class Solution
 * @package App\Models
 *
 * @property integer $id
 * @property string $alias
 * @property string $type
 * @property string $title_uk
 * @property string $title_ru
 * @property integer $power
 * @property string $picture_file_name
 * @property string $solution_url
 * @property integer $display_order
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 */
class Solution extends Model {
  use CriteriaActions, ReorderRecord, Sluggable, AssetFileAttribute, SolutionMixin;

  /**
   * @var string
   */
  protected $table = 'solutions';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'alias',
    'type',
    'title_uk',
    'title_ru',
    'power',
    'picture_file_name',
    'solution_url',
    'display_order',
  ];

  /**
   * @var string[]
   */
  protected $casts = [
    'alias' => 'string',
    'type' => 'string',
    'title_uk' => 'string',
    'title_ru' => 'string',
    'power' => 'integer',
    'picture_file_name' => 'string',
    'solution_url' => 'string',
    'display_order' => 'integer',
  ];

  /**
   * @return string
   */
  public function directoryStorage(): string {
    return DirectoriesStorage::SOLUTION_PICTURE_PATH;
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

}