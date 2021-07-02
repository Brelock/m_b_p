<?php

namespace App\Models\Mixins;

use App\Collection\CategoryCollection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

trait CategoryMixin {
  /**
   * @param Builder $query
   * @param string $value
   * @return string
   */
  protected function getFullTextSearchColumn($query, $value) {
    return 'name';
  }

  /**
   * @param array $models
   * @return CategoryCollection|Collection
   */
  public function newCollection(array $models = []) {
    return new CategoryCollection($models);
  }

  /**
   * @return bool
   */
  public function hasExternalId() : bool {
    return !empty($this->external_id);
  }
}