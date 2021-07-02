<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Link
 * @package App\Models\Admin
 *
 * @property integer $id
 * @property string $title_ru
 * @property string $title_uk
 * @property string $url
 * @property integer $ordering
 *
 */
class Link extends Model {
  /**
   * @var string[]
   */
  protected $fillable = [
    'id',
    'title_ru',
    'title_uk',
    'url',
    'ordering',
  ];

  /**
   * @var string[]
   */
  protected $casts = [
    'id' => 'integer',
    'title_ru' => 'string',
    'title_uk' => 'string',
    'url' => 'string',
    'ordering' =>'integer',
  ];

}
