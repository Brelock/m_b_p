<?php

namespace App\Models\Mixins;

use App\Collection\ParamCollection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

trait ParamMixin {
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
   * @return ParamCollection|Collection
   */
  public function newCollection(array $models = []) {
    return new ParamCollection($models);
  }
}