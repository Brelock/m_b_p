<?php

namespace App\Http\Requests;

use App\DTO\SubscriptionDto;

class SubscriptionRequest extends JsonFormRequest {
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize() {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    return [
      'email' => ['required', 'email'],
    ];
  }

	/**
	 * @return SubscriptionDto
	 */
  public function createDto(): SubscriptionDto {
    return SubscriptionDto::createFromArray($this->all());
  }

  /**
   * @return array
   */
  public function messages() {
    return [
	    'email.required' => 'Email обязателен!',
	    'email.email' => 'Неверно указан формат электронной почты!'
    ];
  }
}
