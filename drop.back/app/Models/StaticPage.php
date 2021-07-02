<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class StaticPage
 * @package App\Models
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $type
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class StaticPage extends Model {
  /**
   * @var string
   */
  protected $table = 'static_pages';

  /**
   * @var array
   */
  protected $fillable = [
    'title',
    'description',
    'type'
  ];
}
