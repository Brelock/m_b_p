<?php

namespace App\Models;

use App\Collection\ProductPictureCollection;
use App\Models\Helpers\CriteriaActions;
use App\Models\Mixins\ProductMixin;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * Class Product
 * @package App\Models
 *
 * @property int $id
 * @property string $external_id
 * @property integer $available
 * @property integer $art
 * @property string $name
 * @property float $price
 * @property float $price_old
 * @property float $old_price_drop
 * @property integer $discount_drop
 * @property float $old_price_opt
 * @property integer $discount_opt
 * @property integer $stock_quantity
 * @property integer $category_id
 * @property string $description
 * @property string $vendor
 * @property Carbon $import_time
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 *
 * @property Category $category
 * @property ProductPicture[]|ProductPictureCollection $pictures
 * @property Param[]|Collection $params
 * @property ProductParam[]|Collection $productParams
 * @property ProductPicture $backgroundPicture
 * @property OrderProduct[]|Collection $orderProducts
 * @property Order[]|Collection $orders
 */
class Product extends Model {
  use CriteriaActions, ProductMixin, SoftDeletes;

  /**
   * @var string
   */
  protected $table = 'products';

  /**
   * The attributes that are mass assignable.
   *
   * @var array $fillable
   */
  protected $fillable = [
    'external_id',
    'available',
    'art',
    'name',
    'price',
    'price_old',
    'old_price_drop',
    'discount_drop',
    'old_price_opt',
    'discount_opt',
    'stock_quantity',
    'category_id',
    'description',
    'vendor',
    'import_time'
  ];

  /**
   * @var array
   */
  protected $casts = [
    'external_id' => 'string',
    'available' => 'bool',
    'art' => 'int',
    'name' => 'string',
    'price' => 'float',
    'price_old' => 'float',
    'old_price_drop' => 'float',
    'discount_drop' => 'int',
    'old_price_opt' => 'float',
    'discount_opt' => 'int',
    'stock_quantity' => 'int',
    'category_id' => 'int',
    'description' => 'string',
    'vendor' => 'string',
  ];

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function category() {
    return $this->belongsTo(Category::class, 'category_id', 'id');
  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function pictures() {
    return $this
	    ->hasMany(ProductPicture::class, 'product_id', 'id')
	    ->orderBy('ordering', 'ASC');
  }

  /**
   * Get many params.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
   */
  public function params() {
    return $this->belongsToMany(
      Param::class,
      (new ProductParam())->getTable(),
      'product_id',
      'param_id'
    );
  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function productParams() {
    return $this->hasMany(ProductParam::class, 'product_id', 'id');
  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function orderProducts() {
    return $this->hasMany(OrderProduct::class, 'product_id', 'id');
  }

}
