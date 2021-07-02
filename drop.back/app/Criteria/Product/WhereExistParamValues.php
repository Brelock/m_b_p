<?php

namespace App\Criteria\Product;

use App\Criteria\ICriteria;
use App\Models\ProductParam;
use App\Models\Scopes\CriteriaScopes;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class WhereExistParamValues implements ICriteria {
  /**
   * @var array
   */
  protected $paramValueIds;

	/**
	 * WhereExistParamValues constructor.
	 *
	 * @param array $paramValueIds
	 */
  public function __construct(array $paramValueIds) {
    $this->paramValueIds = $paramValueIds;
  }

  /**
   * @return bool
   */
  public function hasParamValueIds(): bool {
    return !empty($this->paramValueIds);
  }

	/*
		select *
		from `products`
		where `products`.`category_id` = 360
		and exists(
			select *
			from product_param pp
			where pp.product_id = products.id and pp.param_value_id in(2)
		)

		and exists(
			select *
			from product_param pp
			where pp.product_id = products.id and pp.param_value_id in(63)
		);
	*/

  /**
   * @param  CriteriaScopes|EloquentBuilder|QueryBuilder $builder
   * @return CriteriaScopes|EloquentBuilder|QueryBuilder
   */
  public function apply($builder) {
    return $builder->when($this->hasParamValueIds(), function($builder) {
      /* @var CriteriaScopes|EloquentBuilder|QueryBuilder $builder */
      return $builder->whereExists(function($subQuery) use($builder) {
        /* @var CriteriaScopes|EloquentBuilder|QueryBuilder $subQuery */

        $productColumnId = $builder->withAlias('id');

        $subQuery
          ->from(ProductParam::getTableName()." as pp")
	        ->whereRaw("pp.product_id = {$productColumnId}")
	        ->whereIn("pp.param_value_id", $this->paramValueIds);
      });
    });
  }
}