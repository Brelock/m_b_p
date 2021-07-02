<?php

namespace App\Services\Actions;

class UrlServiceAction {
	/**
	 * @var array
	 */
	protected $sortGetParameters = [
		'&name-order=desc',
		'&name-order=asc',
		'&price-order=desc',
		'&price-order=asc',
		'&presence-order=desc',
		'&presence-order=asc',
		'&date-order=desc',
		'&date-order=asc',
	];

	/**
	 * @return string
	 */
	public function getUrlWithoutSortParams(): string {

		return str_replace($this->sortGetParameters, '', request()->fullUrl());
	}

}