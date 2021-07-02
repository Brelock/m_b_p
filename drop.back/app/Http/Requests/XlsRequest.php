<?php

namespace App\Http\Requests;

use App\DTO\FileUnloadDto;

class XlsRequest extends JsonFormRequest {
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
	    'description' => ['string'],
	    'date_unloaded' => ['required', 'string'],
	    'file' => ['required', 'file'],
	    'icon' => ['image', 'max:5000', 'nullable'],
	    'icon_title' => ['string', 'nullable', 'max:200'],
	    'quantity' => ['numeric', 'min:0'],
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
			'file.required' => 'Обязательно прикрепите файл',
			'file.mimes' => 'Файл должен иметь расширение xls',
			'date_unloaded.required' => 'Обязательно укажите дату загрузки файла',
			'format.required' => 'Формат файла - обязательное поле'
		];
	}

	/**
	 * @return FileUnloadDto
	 */
	public function createDto() : FileUnloadDto {
		return FileUnloadDto::createFromArray(array_merge($this->all(), [
			'file' => $this->file('file'),
			'icon' => $this->file('icon'),
		]));
	}
}
