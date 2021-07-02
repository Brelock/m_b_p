<?php

namespace App\Http\Requests;

use App\DTO\ResultDto;
use App\Models\Category;
use App\Rules\IsRequired;
use Illuminate\Validation\Rule;

class ResultRequest extends JsonFormRequest {
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
			'category_id' => [
				'required',
				'integer',
				Rule::exists((new Category())->getTable(), 'id')
			],
			'length' => [
				'numeric',
				new IsRequired($this->getCategoryType($this->get('category_id'))),
				],
			'width' => [
				'numeric',
				new IsRequired($this->getCategoryType($this->get('category_id'))),
				],
			'height' => [
				'numeric',
				new IsRequired($this->getCategoryType($this->get('category_id'))),
				],
			'diameter' => [
				'numeric',
				new IsRequired($this->getCategoryType($this->get('category_id'))),
				],
			'depth' => [
				'numeric',
				new IsRequired($this->getCategoryType($this->get('category_id'))),
				],
			'quantity' => [
				'required',
				'integer',
				],
		];
	}

	/**
	 * @param integer $categoryId
	 * @return integer
	 */
	public function getCategoryType(int $categoryId): int {
		return Category::query()->where('id', $categoryId)->pluck('type')->get(0);
	}

	/**
	 * @return ResultDto
	 */
	public function createDto(): ResultDto {
		return ResultDto::createFromArray($this->all());
	}

	/**
	 * @return array
	 */
	public function messages() {
		return [
			'category_id.required' => 'Name is required!',
			'email.required' => 'Email is required!',
			'question.required' => 'Question is required!',
		];
	}
}
