<?php

namespace App\Http\Requests;

use App\DTO\CallbackDto;
use App\Enums\CallbacksType;
use Illuminate\Validation\Rule;

class CallbackRequest extends JsonFormRequest {
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
      "name" => ['string', 'max:255', 'nullable'],
      "phone" => [
        'string',
        'max:14',
        'nullable'
      ],
      "email" => [
        'string',
        'email',
        'nullable'
      ],
      "region" => [
        'string',
        'nullable'
      ],
      "message" => ['string', 'nullable'],
      "type" => ['required', 'integer', Rule::in(CallbacksType::getValues())]
    ];
  }

	/**
	 * @return CallbackDto
	 */
  public function createDto(): CallbackDto {
    return CallbackDto::createFromArray($this->all());
  }

  /**
   * @return array
   */
  public function messages() {
    return [
	    'type.required' => 'Type of the callback is required!'
    ];
  }
}
