<?php

namespace App\Http\Requests;

use App\DTO\SeoDto;
use App\Models\Seo;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class SeoRequest extends FormRequest {
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
      'redirect_uri' => [
        'required',
        'string',
        'max:4000',
        'url',
        Rule
          ::unique((new Seo())->getTable(), 'redirect_uri')
          ->ignore(Arr::get($this->route('seo'), 'id')),
      ],
      'title_uk' => ['required', 'string', 'max:255'],
      'title_ru' => ['nullable', 'string', 'max:255'],
      'description_uk' => ['required', 'string'],
      'description_ru' => ['nullable', 'string'],
    ];
  }

  /**
   * Prepare the data for validation.
   *
   * @return void
   */
  protected function prepareForValidation() {
    $this->merge([
      'redirect_uri' => rtrim(str_replace(['/ru/', '/ru'], ['/', ''], $this->redirect_uri), '/'),
    ]);
  }

  /**
   * @return SeoDto
   */
  public function createDto(): SeoDto {
    return SeoDto::createFromArray($this->all());
  }

  /**
   * @return array
   */
  public function messages() {
    return [
      'redirect_uri.required' => 'Redirect Url is required!',
      'title_uk.required' => 'Title Uk is required!',
      'description_uk.required' => 'Description Uk is required!',
    ];
  }
}
