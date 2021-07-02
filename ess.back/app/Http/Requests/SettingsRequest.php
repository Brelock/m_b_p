<?php

namespace App\Http\Requests;

use App\DTO\SettingsDto;

class SettingsRequest extends JsonFormRequest {
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
	 * @return SettingsDto
	 */
  public function createDto(): SettingsDto {
    return SettingsDto::createFromArray($this->all());
  }

  /**
   * @return array
   */
  public function messages() {
    return [
      'email.required' => 'Email is required!',
    ];
  }
}
