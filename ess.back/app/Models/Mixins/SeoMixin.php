<?php

namespace App\Models\Mixins;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

trait SeoMixin {
	/**
	 * @param Builder $query
	 * @param string $value
	 * @return string
	 */
	protected function getFullTextSearchColumn($query, $value) {
		return false;
	}

	/**
	 * @return bool
	 */
	public function isNew(): bool {
		return !$this->exists;
	}
}