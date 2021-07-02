<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class CategoryParam
 * @package App\Models
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $param_id
 */
class CategoryParam extends Model {
  /**
   * @var string
   */
  protected $table = 'category_param';

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function category() {
    return $this->belongsTo(Category::class, 'category_id', 'id');
  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function params() {
    return $this->belongsTo(Param::class, 'param_id', 'id');
  }
}
