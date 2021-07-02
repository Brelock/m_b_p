<?php

namespace App\Criteria\ParamValue;

use App\Criteria\ICriteria;
use App\Models\Scopes\CriteriaScopes;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class WhereValues implements ICriteria {
	/**
	 * @var array
	 */
	protected $values;

	/**
	 * WhereValues constructor.
	 *
	 * @param array $values
	 */
	public function __construct(array $values) {
		$this->values = $values;
	}

	/**
	 * @param CriteriaScopes|EloquentBuilder|QueryBuilder $builder
	 * @return CriteriaScopes|EloquentBuilder|QueryBuilder
	 */
	public function apply($builder) {
		return $builder->whereIn($builder->withAlias('value'), $this->values);
	}
}