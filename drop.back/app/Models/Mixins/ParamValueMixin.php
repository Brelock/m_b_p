<?php

namespace App\Models\Mixins;

use App\Collection\ParamValueCollection;
use App\Query\EloquentBuilder as Builder;

trait ParamValueMixin {

	/**
	 * @param  Builder $query
	 * @param  string $value
	 * @return string
	 */
	protected function getFullTextSearchColumn($query, $value) {
		return 'value';
	}

	/**
	 * @param array $models
	 * @return ParamValueCollection|\Illuminate\Database\Eloquent\Collection
	 */
	public function newCollection(array $models = []) {
		return new ParamValueCollection($models);
	}
}