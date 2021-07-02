<?php

namespace App\Models\Mixins;

use App\Models\Review;
use Illuminate\Database\Eloquent\Builder;

trait ReviewMixin {

  /**
   * @param Builder $query
   * @param string $value
   * @return bool
   */
  protected function getFullTextSearchColumn($query, $value) {
    return '';
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
  public function getBackgroundImagePath(): ?string {
    /* @var Review|self $this */
    return $this->picture_file_name
      ? $this->assetAbsolute($this->picture_file_name)
      : null;
  }
}