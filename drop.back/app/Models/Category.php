<?php

namespace App\Models;

use App\Collection\CategoryCollection;
use App\Collection\ParamCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Helpers\CriteriaActions;
use App\Models\Mixins\CategoryMixin;
use App\Models\Scopes\CategoryScopes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * Class Category
 * @package App\Models
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $external_id
 * @property string $external_parent_id
 * @property string $name
 * @property integer $display_order
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 *
 * @property int $products_count
 *
 * @property Product[]|Collection $product
 * @property Param[]|ParamCollection $params
 * @property Category[]|CategoryCollection $subCategories
 *
 * @property Category $parent
 */
class Category extends Model {
  use CriteriaActions, CategoryScopes, CategoryMixin, SoftDeletes;

  /**
   * @var string
   */
  protected $table = 'categories';

	/**
	 * @var array
	 */
	protected $fillable = [
		'parent_id',
		'external_id',
		'external_parent_id',
		'name',
		'display_order',
		'deleted_at'
	];

  /**
   * @var array
   */
  protected $casts = [
    'parent_id' => 'int',
    'external_id' => 'string',
    'external_parent_id' => 'string',
    'name' => 'string',
    'display_order' => 'int',
  ];

  /**
   * @var CategoryCollection
   */
  public $_subCategories;

	/**
	 * @var int
	 */
  public $_totalProducts = 0;

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function parent() {
    return $this->belongsTo(self::class, 'parent_id', 'id');
  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function subCategories() {
    return $this->hasMany(self::class, 'parent_id', 'id');
  }

  /**
   * Get products for the category.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function products() {
    return $this->hasMany(Product::class, 'category_id', 'id');
  }

	/**
   * Get many params.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
   */
  public function params() {
    return $this
      ->belongsToMany(
        Param::class,
        (new CategoryParam())->getTable(),
        'category_id',
        'param_id'
      )
      ->withTimestamps();
  }

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
  public function categoryParams() {
    return $this->hasMany(CategoryParam::class, 'category_id', 'id');
  }
}
