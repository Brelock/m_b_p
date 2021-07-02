<?php

namespace App\Rules;

use App\Enums\ReviewsType;
use Illuminate\Contracts\Validation\Rule;

class CheckReviewType implements Rule {
	/**
   * Determine if the validation rule passes.
   *
   * @param  string $attribute
   * @param  mixed $value
   * @return bool
   */
  public function passes($attribute, $value) {
  	if(!empty($value)) {
  		if(in_array($value, ReviewsType::getValues()))
        return true;
  		return false;
	  }
    return false;
  }

  /**
   * Get the validation error message.
   *
   * @return string
   */
  public function message() {
    return 'This attribute is incorrect.';
  }
}
