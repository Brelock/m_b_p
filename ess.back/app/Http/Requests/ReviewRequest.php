<?php

namespace App\Http\Requests;

use App\DTO\ReviewDto;
use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest {
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
      'title' => ['string', 'max:255', 'nullable'],
      'text_ru' => ['string', 'max:4000', 'nullable'],
      'text_uk' => ['string', 'max:4000', 'nullable'],
      'author_name_ru' => ['string', 'max:255', 'nullable'],
      'author_name_uk' => ['string', 'max:255', 'nullable'],
      'work_url' => ['url', 'nullable'],
      'video_url' => ['url', 'nullable'],
      'file' => ['file', 'nullable'],
      'deletePicture' => ['integer', 'nullable']
		];
	}

	/**
	 * @return ReviewDto
	 */
	public function createDto(): ReviewDto {
		return ReviewDto::createFromArray($this->all());
	}
}
