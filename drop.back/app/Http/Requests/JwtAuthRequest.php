<?php

namespace App\Http\Requests;

use App\DTO\AuthDto;

class JwtAuthRequest extends JsonFormRequest {
  /**
   * @return bool
   */
  public function authorize() {
    return true;
  }

  /**
   * @return array
   */
  public function rules() {
    return [
      'email' => ['required', 'string', 'email'],
      'password' => ['required', 'min:6', 'max:20']
    ];
  }

  /**
   * @return AuthDto
   */
  public function createDto() : AuthDto {
    return AuthDto::createFromArray($this->all());
  }
}
