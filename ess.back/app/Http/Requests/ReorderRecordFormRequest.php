<?php

namespace App\Http\Requests;

/**
 * Class for validation rules of request reorder records.
 *
 * @package App\Http\Requests
 */
class ReorderRecordFormRequest extends JsonFormRequest {
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
      'currentId' => ['required', 'integer'],
      'desiredId' => ['integer'],
    ];
  }
}
