<?php

namespace App\Collection;

use App\Models\ProductParam;
use \Illuminate\Database\Eloquent\Collection;

class ProductParamCollection extends Collection {
	/**
	 * @return $this
	 */
	public function keyByParamWithValueId(): self {
		return $this->keyBy(function ($productParam) {
			/* @var ProductParam $productParam */
			return "{$productParam->param_id}|{$productParam->param_value_id}";
		});
	}
}