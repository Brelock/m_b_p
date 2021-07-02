<?php

namespace App\Criteria\Product;

use App\Criteria\ICriteria;
use App\Models\Scopes\CriteriaScopes;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class WhereCategories implements ICriteria {
	/**
	 * @var array
	 */
	public $categoriesIds;

	/**
	 * WhereCategories constructor.
   *
	 * @param array $categoriesIds
	 */
	public function __construct(array $categoriesIds) {
		$this->categoriesIds = $categoriesIds;
	}

	/**
	 * @param CriteriaScopes|EloquentBuilder|QueryBuilder $builder
	 * @return CriteriaScopes|EloquentBuilder|QueryBuilder|mixed
	 */
	public function apply($builder) {
		return $builder->when(!empty($this->categoriesIds), function($builder) {
			/* @var CriteriaScopes|EloquentBuilder|QueryBuilder $builder */
			return $builder->whereIn($builder->withAlias('category_id'), $this->categoriesIds);
		});
	}
}