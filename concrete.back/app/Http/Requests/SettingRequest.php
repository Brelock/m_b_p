<?php

namespace App\Http\Requests;

use App\DTO\SettingDto;

class SettingRequest extends JsonFormRequest {
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
      'title' => ['required', 'string', 'max:255'],
      'subtitle' => ['required', 'string', 'max:255'],
      'email' => ['required', 'email'],
      'footer' => ['nullable', 'string', 'max:255']
    ];
  }

	/**
	 * @return SettingDto
	 */
  public function createDto(): SettingDto {
    return SettingDto::createFromArray($this->all());
  }

  /**
   * @return array
   */
  public function messages() {
    return [
      'title.required' => 'Title is required!',
      'subtitle.required' => 'Subtitle is required!',
      'email.required' => 'Email is required!',
    ];
  }
}
