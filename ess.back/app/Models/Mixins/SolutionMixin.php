<?php

namespace App\Models\Mixins;

use App\Models\Solution;
use Illuminate\Database\Eloquent\Builder;


trait SolutionMixin {
  /**
   * @param Builder $query
   * @param string $value
   * @return bool
   */
  protected function getFullTextSearchColumn($query, $value) {
    return 'title_uk';
  }

  /**
   * @return string|null
   */
  public function getBackgroundImagePath(): ?string {
    /* @var Solution|self $this */
    return $this->picture_file_name
      ? $this->assetAbsolute($this->picture_file_name)
      : null;
  }

  /**
   * @return bool
   */
  public function isNew(): bool {
    return !$this->exists;
  }

}