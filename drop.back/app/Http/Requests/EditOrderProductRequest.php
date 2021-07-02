<?php

namespace App\Http\Requests;

use App\DTO\EditOrderProductDto;

class EditOrderProductRequest extends JsonFormRequest {
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
      'quantity' => ['required', 'numeric', 'min:0', 'not_in:0'],
    ];
  }

  /**
   * @return EditOrderProductDto
   */
  public function createDto() : EditOrderProductDto {
    return EditOrderProductDto::createFromArray($this->all());
  }
}
