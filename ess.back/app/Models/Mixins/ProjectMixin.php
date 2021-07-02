<?php

namespace App\Models\Mixins;

use App\Models\Project;
use Illuminate\Database\Eloquent\Builder;

trait ProjectMixin {
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
   * @return bool
   */
	public function isMain(): bool{
	  return $this->is_main==$this::IS_MAIN;
  }

	/**
	 * @return string|null
	 */
	public function getBackgroundImagePath(): ?string {
		/* @var Project|self $this */
		return $this->mainPicture
			? $this->mainPicture->getOriginalImagePath()
			: null;
	}
}