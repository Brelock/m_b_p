<?php

namespace App\Filters;

use Carbon\Carbon;

class CalcRequestFilters extends Filters {
	/**
	 * @var string[]
	 */
	protected $filters = [
		'dateStart',
		'dateEnd',
	];

	/**
	 * @param $date
	 *
	 * @return mixed
	 */
	protected function dateStart($date) {
		$dateStart = (new Carbon($date))->format('Y-m-d');
		return $this->builder->where('created_at', '>=', $dateStart);
	}

	/**
	 * @param $date
	 *
	 * @return mixed
	 */
	protected function dateEnd($date) {
		$dateEnd = (new Carbon($date))->format('Y-m-d') . " 23:59:59";
		return $this->builder->where('created_at', '<=', $dateEnd);
	}

}