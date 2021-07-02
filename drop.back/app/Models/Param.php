<?php

namespace App\Models;

use App\Models\Helpers\CriteriaActions;
use App\Models\Mixins\ParamMixin;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class Param
 * @package App\Models
 *
 * @property integer $id
 * @property integer $title
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property ProductParam[]|Collection $productParams
 * @property CategoryParam[]|Collection $categoryParams
 * @property ParamValue[]|Collection $paramValues
 */
class Param extends Model {
  use CriteriaActions, ParamMixin;

  /**
   * @var string
   */
  protected $table = 'params';

  /**
   * @var array
   */
  protected $fillable = [
    'title',
  ];

  /**
   * @var array
   */
  protected $casts = [
    'title' => 'string',
  ];

	/**
	 * @var ProductParam[]|Collection
	 */
  public $values = [];

	/**$value
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
  public function productParams() {
  	return $this->hasMany(ProductParam::class, 'param_id', 'id');
  }

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
  public function categoryParams() {
  	return $this->hasMany(CategoryParam::class, 'param_id', 'id');
  }

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
  public function categories() {
  	return $this->belongsToMany(
  		Category::class,
		  (new CategoryParam())->getTable(),
		  'category_id',
		  'param_id'
	  )
		  ->withTimestamps();
  }

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
  public function products() {
	  return $this->belongsToMany(
		  Product::class,
		  (new ProductParam())->getTable(),
		  'category_id',
		  'param_id'
	  )
		  ->withTimestamps();
  }

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function paramValues() {
  	return $this->hasMany(ParamValue::class, 'param_id', 'id');
	}

  /**
   * @param Builder $query
   * @param string $value
   * @return string
   */
  protected function getFullTextSearchColumn($query, $value) {
    return 'title';
  }
}
