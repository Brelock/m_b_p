<?php

namespace App\Http\Requests;

use App\DTO\ProductDto;
use App\Models\ProductPicture;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest {
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
      'title_ru' => ['required', 'string'],
      'price' => ['numeric', 'nullable'],
      'sub_description_uk' => ['string', 'nullable'],
      'sub_description_ru' => ['string', 'nullable'],
      'type' => ['required', 'integer'],
      'seo_title_uk' => ['string', 'nullable'],
      'seo_title_ru' => ['string', 'nullable'],
      'seo_description_uk' => ['string', 'nullable'],
      'seo_description_ru' => ['string', 'nullable'],
      'fileXml' => ['file', 'nullable'],
      'deleteXml' => ['integer', 'nullable'],
      'files' => ['array', 'nullable'],
      'files.*' => ['image', 'max:5000'],
      'pictures_id' => ['array', 'nullable'],
      'pictures_id.*' => ['integer', 'nullable', Rule::exists((new ProductPicture())->getTable(), 'id')],
      'params' => ['array', 'nullable'],
      'params.title_ru.*' => ['required', 'string'],
      'params.title_uk.*' => ['required', 'string'],
      'params.value_ru.*' => ['required', 'string'],
      'params.value_uk.*' => ['required', 'string'],

    ];
  }

  /**
   * @return ProductDto
   */
  public function createDto(): ProductDto {
    return ProductDto::createFromArray(array_merge($this->all(), [
      'fileXml' => $this->file('fileXml'),
    ]));
  }
}
