<?php

namespace App\Http\Requests;

use App\DTO\BannerDto;
use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest {
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
	    'file' => [
	    	'required',
		    'file',
		    'mimes:jpeg,jpg,png,gif',
		    'max:5000'
	    ],
      'url' => [
	      'url',
	      'nullable'
      ],
    ];
  }

	/**
	 * @return array
	 */
	public function messages() {
		return [
			'file.required' => 'Изображение обязательное поле для загрузки',
			'file.mimes' => 'Изображение должно иметь расширение jpg, bmp, png',
			'file.max' => 'Изображение слишком большого размера',
			'url.url' => 'Ссылка не верного формата',
		];
	}

	/**
	 * @return BannerDto
	 */
	public function createDto() : BannerDto {
		return BannerDto::createFromArray(array_merge($this->all(), [
			'file' => $this->file('file'),
		]));
	}
}
