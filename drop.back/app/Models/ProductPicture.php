<?php

namespace App\Models;

use App\Enums\DirectoriesStorage;
use App\Models\Helpers\AssetFileAttribute;
use App\Models\Helpers\CriteriaActions;
use App\Models\Mixins\ProductPictureMixin;
use App\Models\Scopes\ProductPictureScopes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class ProductPicture
 * @package App\Models
 *
 * @property int $id
 * @property integer $product_id
 * @property string $file_name
 * @property string $thumbnail_name
 * @property integer $ordering
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Product $product
 */
class ProductPicture extends Model {
  use CriteriaActions, ProductPictureScopes, ProductPictureMixin, AssetFileAttribute;

  /**
   * @var string
   */
  protected $table = 'product_pictures';

  /**
   * The attributes that are mass assignable.
   *
   * @var array $fillable
   */
  protected $fillable = [
    'product_id',
    'file_name',
    'thumbnail_name',
    'ordering'
  ];

  /**
   * @var array
   */
  protected $casts = [
    'product_id' => 'int',
    'file_name' => 'string',
    'thumbnail_name' => 'string',
    'ordering' => 'integer',
  ];

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function product() {
    return $this->belongsTo(Product::class, 'product_id', 'id');
  }

  /**
   * @return string
   */
  public function directoryStorage() : string {
    return DirectoriesStorage::PRODUCT_PICTURE_PATH;
  }
}