<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TariffRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title_ru' => 'required',
            'title_uk' => 'required',
//            'subtitle_first_ru' => 'required',
//            'subtitle_first_uk' => 'required',
//            'subtitle_second_ru' => 'required',
//            'subtitle_second_uk' => 'required',
//            'description_ru' => 'required',
//            'description_uk' => 'required',
            'tariff_category_id' => 'required',
		        'link' => ['url', 'nullable'],
		        'link_uk' => ['url', 'nullable'],
            'image' => 'image|mimes:jpeg,bmp,png|max:5000'
        ];
    }

    public function messages()
    {
        return [
            'title_ru.required' => 'Необходимо указать название тарифа!',
            'title_uk.required' => 'Необходимо указать название тарифа для украинской версии!',
            'description_ru.required' => 'Необходимо заполнить описание!',
            'description_uk.required' => 'Необходимо заполнить описание для украинской версии!',
            'tariff_category_id.required' => 'Необходимо выбрать категорию!',
//            'image.required' => 'Необходимо выбрать изображение изображени',
            'link_ru.url' => 'Необходимо указать ссылку!',
            'link_uk.url' => 'Необходимо указать ссылку для украинской версии!',
            'image.mimes' => 'Допустимые форматы загрузки излбражения: jpeg, bmp, png !',
            'image.max' => 'Допустимый размер файла 5мб !',
        ];
    }
}