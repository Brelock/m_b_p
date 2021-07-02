<?php

namespace App\Http\Requests;

use App\DTO\ProjectDto;
use App\Models\ProjectPicture;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectRequest extends FormRequest {
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
			'is_main' => ['integer', 'nullable'],
			'title_uk' => ['required', 'string'],
			'title_ru' => ['string', 'nullable'],
			'address_uk' => ['string', 'max:4000', 'nullable'],
			'address_ru' => ['string', 'max:4000', 'nullable'],
			'options_uk' => ['string', 'max:4000', 'nullable'],
			'options_ru' => ['string', 'max:4000', 'nullable'],
			'exploitation_uk' => ['string', 'max:4000', 'nullable'],
			'exploitation_ru' => ['string', 'max:4000', 'nullable'],
			'seo_title_uk' => ['string', 'nullable'],
			'seo_title_ru' => ['string', 'nullable'],
			'seo_description_uk' => ['string', 'nullable'],
			'seo_description_ru' => ['string', 'nullable'],
			'files' => ['array', 'nullable'],
			'files.*' => ['image', 'max:5000'],
			'mainFile' => ['image', 'max:5000'],
			'pictures_id' => ['array', 'nullable'],
			'pictures_id.*' => ['integer', 'nullable', Rule::exists((new ProjectPicture())->getTable(), 'id')]
		];
	}

	/**
	 * @return ProjectDto
	 */
	public function createDto(): ProjectDto {
		return ProjectDto::createFromArray($this->all());
	}
}
