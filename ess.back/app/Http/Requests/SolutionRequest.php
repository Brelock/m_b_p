<?php

namespace App\Http\Requests;


use App\DTO\SolutionDto;
use Illuminate\Foundation\Http\FormRequest;

class SolutionRequest extends FormRequest {
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
			'alias' => ['string', 'nullable'],
			'type' => ['required', 'string'],
			'title_uk' => ['required', 'string'],
			'title_ru' => ['string', 'nullable'],
			'power' => ['integer', 'nullable'],
			'solution_url' => ['url', 'nullable'],
      'file' => ['file', 'nullable'],
      'deletePicture' => ['integer', 'nullable']
		];
	}

	/**
	 * @return SolutionDto
	 */
	public function createDto(): SolutionDto {
    return SolutionDto::createFromArray(array_merge($this->all(), [
      'file' => $this->file('file'),
    ]));
	}

  /**
   * @return array|string[]
   */
  public function messages() {
    return [
      'title_uk.required' => 'Название готового решения обязательно!',
      'type.required' => 'Тип готового решения обязателен!',
    ];
  }

}
