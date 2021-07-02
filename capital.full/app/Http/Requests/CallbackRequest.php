<?php

namespace App\Http\Requests;

use App\Rules\CheckPhone;
use Illuminate\Validation\Rule;

class CallbackRequest extends JsonFormRequest {
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
      'name' => [
        'required',
//        Rule::requiredIf(function () {
//          return !$this->has('evaluation');
//        }),
        'string',
        'min:3',
        'max:40',
      ],
      'phone' => [
        'required',
        'string',
        'size:15',
        new CheckPhone(),
      ],
    ];
  }

  /**
   * @return string[]
   */
  public function messages() {
    return [
      'name.required' => 'Необходимо указать Ваше имя',
      'name.min' => 'Похоже у Вас слишком короткое имя',
      'name.max' => 'Похоже у Вас слишком длинное имя',
      'phone.required' => 'Номер телефона обязателен для заполнения',
      'phone.size' => 'Не соответствует формату телефонного номера',
    ];
  }
}
