<?php

namespace App\Models\Mixins;

use App\Models\Sunport;
use Illuminate\Database\Eloquent\Builder;

trait SunportMixin {
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
  public function getXlsFileName(): ?string {
    /* @var Sunport|self $this */
    return isset($this->xls_file_name) ? $this->xls_file_name : null;
  }

  /**
   * @return string|null
   */
  public function getPictureFileName(): ?string {
    /* @var Sunport|self $this */
    return isset($this->picture_file_name) ? $this->picture_file_name : null;
  }

}