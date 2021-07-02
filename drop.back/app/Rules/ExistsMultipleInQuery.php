<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ExistsMultipleInQuery implements Rule {
  /**
   * @var Builder $queryBuilder
   */
  public $queryBuilder;

  /**
   * @var string $column
   */
  public $column;

  /**
   * Create a new rule instance.
   *
   * @param Model|Builder $queryBuilder
   * @param string $column
   * @return void
   */
  public function __construct($queryBuilder, $column = 'id') {
    $this->queryBuilder = $queryBuilder;
    $this->column = $column;
  }

  /**
   * Determine if the validation rule passes.
   *
   * @param  string $attribute
   * @param  mixed $value
   * @return bool
   */
  public function passes($attribute, $value) {
    /* @var Builder $queryBuilder */
    $queryBuilder = $this->queryBuilder;
    if($this->queryBuilder instanceof Model)
      $queryBuilder = $this->queryBuilder->newQuery();

    return $queryBuilder->whereIn($this->column, $value)->count() == count($value);
  }

  /**
   * Get the validation error message.
   *
   * @return string
   */
  public function message() {
    return t('error', 'Not all IDs were found.');
  }
}
