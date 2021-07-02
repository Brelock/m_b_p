<?php

namespace App\Http\Requests;

use App\DTO\RequestDto;

class RequestRequest extends JsonFormRequest {
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
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'email'],
      'question' => ['required', 'string']
    ];
  }

	/**
	 * @return RequestDto
	 */
  public function createDto(): RequestDto {
    return RequestDto::createFromArray($this->all());
  }

  /**
   * @return array
   */
  public function messages() {
    return [
      'name.required' => 'Name is required!',
	    'email.required' => 'Email is required!',
      'question.required' => 'Question is required!',
    ];
  }
}
