<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title_ru' => 'required',
            'title_uk' => 'required',
            'description_ru' => 'required',
            'description_uk' => 'required',
//            'start_at' => 'required',
//            'finish_at' => 'required',
            'photo' => 'mimes:jpeg,bmp,png,jpg|max:5000',
            'wide_photo' => 'mimes:jpeg,bmp,png,jpg|max:5000',
        ];
    }

    public function messages()
    {
        return [
            'title_ru.required' => 'Необходимо указать заголовок!',
            'title_uk.required' => 'Необходимо указать заголовок для украинской версии!',
            'description_ru.required' => 'Необходимо заполнить описание!',
            'description_uk.required' => 'Необходимо заполнить описание для украинской версии!',
            'start_at.required' => 'Выберите дату начала акции',
            'finish_at.required' => 'Выберите дату окончания акции',
            'photo.required' => 'Необходимо выбрать изображение',
            'photo.mimes' => 'Допустимые форматы загрузки излбражения: jpeg, bmp, png,jpg!',
            'photo.max' => 'Допустимый размер файла 5мб !',
            'wide_photo.required' => 'Необходимо выбрать изображение',
            'wide_photo.mimes' => 'Допустимые форматы загрузки излбражения: jpeg, bmp, png,jpg!',
            'wide_photo.max' => 'Допустимый размер файла 5мб !',
        ];
    }
}
