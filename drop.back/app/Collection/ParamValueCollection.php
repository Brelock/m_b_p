<?php

namespace App\Collection;

use App\Models\ParamValue;
use \Illuminate\Database\Eloquent\Collection;

class ParamValueCollection extends Collection {
	/**
	 * @return $this
	 */
	public function keyByParamWithSelfId(): self {
		return $this->keyBy(function($value) {
			/* @var ParamValue $value */
			return "{$value->param_id}|{$value->id}";
		});
	}
}