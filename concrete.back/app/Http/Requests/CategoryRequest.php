<?php

namespace App\Http\Requests;

use App\DTO\CategoryDto;

class CategoryRequest extends JsonFormRequest {
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
      'formula' => ['required', 'string', 'max:255'],
	    'files' => ['array'],
	    'files.*' => [
		    'image',
		    'max:5000',
	    ]
    ];
  }

	/**
	 * @return CategoryDto
	 */
  public function createDto(): CategoryDto {
    return CategoryDto::createFromArray($this->all());
  }

  /**
   * @return array
   */
  public function messages() {
    return [
      'title.required' => 'Title is required!',
	    'formula.required' => 'Formula is required!'
    ];
  }
}
