<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Database\Eloquent\Builder;

class ExistsMultipleInArray implements Rule {
  /**
   * @var array $array
   */
  public $array;

  /**
   * Create a new rule instance.
   *
   * @param array $array
   * @return void
   */
  public function __construct($array) {
    $this->array = $array;
  }

  /**
   * Determine if the validation rule passes.
   *
   * @param  string $attribute
   * @param  mixed $value
   * @return bool
   */
  public function passes($attribute, $value) {
    $exists = array_filter($this->array, function($item) use($value) {
      return in_array($item, $value);
    });

    return count($exists) == count($value);
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
