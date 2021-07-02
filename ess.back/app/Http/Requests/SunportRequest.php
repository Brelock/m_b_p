<?php

namespace App\Http\Requests;

use App\DTO\SunportDto;
use Illuminate\Foundation\Http\FormRequest;

class SunportRequest extends FormRequest {
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
//    dd($this->all());
    return [
      'alias' => ['string', 'nullable'],
      'title_uk' => ['required', 'string'],
      'title_ru' => ['required', 'string'],
      'price' => ['numeric', 'nullable'],
      'sub_title_uk' => ['string', 'nullable'],
      'sub_title_ru' => ['string', 'nullable'],
      'seo_title_uk' => ['string', 'nullable'],
      'seo_title_ru' => ['string', 'nullable'],
      'fileXls' => ['file', 'nullable'],
      'deleteXls' => ['integer', 'nullable'],
      'filePicture' => ['file', 'nullable'],
      'deletePicture' => ['integer', 'nullable'],
      'params' => ['array', 'nullable'],
      'params.*.title_ru' => ['required', 'string'],
      'params.*.title_uk' => ['required', 'string'],
      'params.*.value_ru' => ['required', 'string'],
      'params.*.value_uk' => ['required', 'string'],
      'paramsPicture' => ['array', 'nullable'],
      'paramsPicture.*.title_ru' => ['required', 'string'],
      'paramsPicture.*.title_uk' => ['required', 'string'],
      'paramsPicture.*.filePicture' => ['file', 'nullable'],
    ];
  }

  /**
   * @return SunportDto
   */
  public function createDto(): SunportDto {
    return SunportDto::createFromArray(array_merge($this->all(), [
      'fileXls' => $this->file('fileXls'),
      'filePicture' => $this->file('filePicture'),
      'filePictures' => $this->file('paramsPicture.*.filePicture'),
    ]));
  }
}
