<?php

namespace App\Models\Mixins;

use App\Collection\ProductParamCollection;
use App\Query\EloquentBuilder as Builder;

trait ProductParamMixin {

	/**
	 * @param  Builder $query
	 * @param  string $value
	 * @return string
	 */
	protected function getFullTextSearchColumn($query, $value) {
		return 'param_value_id';
	}

	/**
	 * @param array $models
	 * @return ProductParamCollection|\Illuminate\Database\Eloquent\Collection
	 */
	public function newCollection(array $models = []) {
		return new ProductParamCollection($models);
	}
}