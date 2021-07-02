<?php

namespace App\Http\Requests;

use App\DTO\FileUnloadDto;
use Illuminate\Foundation\Http\FormRequest;

class XmlRequest extends FormRequest {
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
      'title' => ['required', 'string'],
      'file_url' => ['required', 'url'],
      'description' => ['nullable', 'string'],
	    'icon' => ['image', 'max:5000', 'nullable'],
	    'icon_title' => ['string', 'nullable', 'max:200'],
	    'quantity' => ['integer', 'min:0', 'nullable'],
	    'deleteIcon' => ['integer', 'nullable'],
	    'format' => ['integer', 'required'],
    ];
  }

	/**
	 * @return array
	 */
	public function messages() {
		return [
			'title.required' => 'Название XML ссылки - обязательное поле',
			'file_url.required' => 'XML ссылка - обязательное поле',
			'format.required' => 'Формат файла - обязательное поле'
		];
	}

	/**
	 * @return FileUnloadDto
	 */
	public function createDto() : FileUnloadDto {
		return FileUnloadDto::createFromArray(array_merge($this->all(), [
			'icon' => $this->file('icon'),
		]));
	}
}
