<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinkRequest extends FormRequest {
  public function authorize() {
    return true;
  }

  public function rules() {
    return [
      'title_ru' => [
        'required',
        'string'
      ],
      'title_uk' => [
        'nullable',
        'string'
      ],
      'url' => [
        'required',
        'string',
        'url'
      ]
    ];
  }

  public function messages() {
    return [
      'title_ru.required' => 'Необходимо указать заголовок!',
      'url.required' => 'Необходимо указать url!',
      'url.url' => 'Не верно указан формат url!',
    ];
  }
}
