<?php

namespace App\Http\Requests;

use App\DTO\NewsDto;
use App\Models\NewsPicture;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class NewsRequest extends FormRequest {
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
			'title_uk' => ['required', 'string'],
			'title_ru' => ['string', 'nullable'],
			'text_uk' => ['required', 'string'],
			'text_ru' => ['string', 'nullable'],
			'is_published' => ['required', 'boolean'],
			'publication_date' => ['nullable'],
			'seo_title_uk' => ['string', 'nullable'],
			'seo_title_ru' => ['string', 'nullable'],
			'seo_description_uk' => ['string', 'nullable'],
			'seo_description_ru' => ['string', 'nullable'],
			'files' => ['array', 'nullable'],
			'files.*' => ['image', 'max:5000'],
			'mainFile' => ['image', 'max:5000'],
			'pictures_id' => ['array', 'nullable'],
			'pictures_id.*' => ['integer', 'nullable', Rule::exists((new NewsPicture())->getTable(), 'id')]
		];
	}

	/**
	 * Prepare the data for validation.
	 *
	 * @return void
	 */
	protected function prepareForValidation()
	{
		$this->merge([
			'is_published' => (bool) $this->is_published ?: false,
			'publication_date' => $this->publication_date ? Carbon::parse($this->publication_date) : null,
		]);
	}

	/**
	 * @return NewsDto
	 */
	public function createDto(): NewsDto {
		return NewsDto::createFromArray($this->all());
	}
}
