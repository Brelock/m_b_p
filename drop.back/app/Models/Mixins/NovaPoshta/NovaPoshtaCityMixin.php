<?php

namespace App\Models\Mixins\NovaPoshta;

use Illuminate\Database\Eloquent\Builder;

trait NovaPoshtaCityMixin {
  /**
   * @param Builder $query
   * @param mixed $value
   * @return \Closure
   */
  protected function getFullTextSearchColumn($query, $value) {
    return function ($query, $value) {
      /**
       * @var Builder $query
       * @var mixed $value
       */
      return $query->where(function ($query) use ($value) {
        /**
         * @var Builder $query
         * @var mixed $value
         */
        $query
          ->where('description_en', 'like', "%{$value}%")
          ->orWhere('description_ru', 'like', "%{$value}%")
          ->orWhere('description_uk', 'like', "%{$value}%");
      });
    };
  }
}