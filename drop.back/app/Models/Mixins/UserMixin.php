<?php

namespace App\Models\Mixins;

use Illuminate\Database\Eloquent\Builder;

trait UserMixin {
  /**
   * @param Builder $query
   * @param string $value
   * @return \Closure
   */
  protected function getFullTextSearchColumn($query, $value) {
    return function ($query, $value) {
      /**
       * @var \Illuminate\Database\Eloquent\Builder $query
       * @var mixed $value
       */
      return $query->where(function ($query) use ($value) {
        /**
         * @var \Illuminate\Database\Eloquent\Builder $query
         * @var mixed $value
         */
        $query
          ->where('first_name', 'like', "%{$value}%")
          ->orWhere('last_name', 'like', "%{$value}%")
          ->orWhere('email', 'like', "%{$value}%");
      });
    };
  }

  /**
   * Get the user's full name.
   *
   * @return string
   */
  public function getFullNameAttribute() {
    return trim("{$this->last_name} {$this->first_name}");
  }
}