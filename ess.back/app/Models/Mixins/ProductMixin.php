<?php

namespace App\Models\Mixins;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

trait ProductMixin {
	/**
	 * @param Builder $query
	 * @param string $value
	 * @return bool
	 */
	protected function getFullTextSearchColumn($query, $value) {
		return 'title_uk';
	}

	/**
	 * @return bool
	 */
	public function isNew(): bool {
		return !$this->exists;
	}

  /**
   * @return string|null
   */
  public function getXmlFileName(): ?string {
    /* @var Product|self $this */
    return isset($this->xls_file_name) ? $this->xls_file_name : null;
  }

}