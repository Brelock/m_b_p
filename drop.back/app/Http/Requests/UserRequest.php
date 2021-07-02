<?php

namespace App\Http\Requests;

use App\DTO\UserDto;
use Illuminate\Validation\Rule;

class UserRequest extends JsonFormRequest {
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
      'first_name' => ['required', 'string', 'max:255'],
      'last_name' => ['required', 'string', 'max:255'],

      'email' => ['required', 'email'],

      'password' => [
        'nullable',
        Rule::requiredIf(function() {
          return $this->routeIs('createUser');
        }),
        'string',
        'min:6',
        'max:20',
      ],
    ];
  }

  /**
   * @return UserDto
   */
  public function createDto() : UserDto {
    return UserDto::createFromArray($this->all());
  }
}
