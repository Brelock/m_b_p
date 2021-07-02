<?php

namespace App\Http\Requests;

use App\Enums\StaticPageTypes;
use Illuminate\Validation\Rule;

class StaticPagesRequest extends JsonFormRequest {
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
			'types' => ['required', 'array'],
			'types.*' => ['required', 'integer', Rule::in(StaticPageTypes::getValues())],

			'descriptions' => ['required', 'array'],
			'descriptions.*' => ['required', 'string'],
		];
	}
}
