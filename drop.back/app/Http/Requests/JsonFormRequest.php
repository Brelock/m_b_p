<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class JsonFormRequest extends FormRequest {
  /**
   * @var string
   */
  protected $validationPrefixForMultipleKey = '';

  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize() {
    return false;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    return [
      //
    ];
  }

  /**
   * Return json errors to client if validation is not passed.
   *
   * @param Validator $validator
   * @throws HttpResponseException
   */
  protected function failedValidation(Validator $validator) {
    throw new HttpResponseException(response()->json($validator->errors(), 422));
  }

  /**
   * @param string $prefix
   * @return $this
   */
  public function setValidationPrefixForMultipleKey(string $prefix) {
    $this->validationPrefixForMultipleKey = $prefix;
    return $this;
  }
}
