<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromoRequest extends FormRequest
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
            'photo' => 'image|mimes:jpeg,bmp,png,jpg|max:5000',
            'wide_photo' => 'image|mimes:jpeg,bmp,png,jpg|max:5000',
            'client_photo' => 'image|mimes:jpeg,bmp,png,jpg|max:5000',
            'photo_uk' => 'image|mimes:jpeg,bmp,png,jpg|max:5000',
            'wide_photo_uk' => 'image|mimes:jpeg,bmp,png,jpg|max:5000',
            'client_photo_uk' => 'image|mimes:jpeg,bmp,png,jpg|max:5000',
        ];
    }

    public function messages()
    {
        return [
            'title_ru.required' => 'Необходимо указать заголовок!',
            'title_uk.required' => 'Необходимо указать заголовок для украинской версии!',
            'alias' => 'Необходимо указать алиас!',
            'description_ru.required' => 'Необходимо заполнить описание!',
            'description_uk.required' => 'Необходимо заполнить описание для украинской версии!',
            'photo.required' => 'Необходимо выбрать изображение',
            'photo.mimes' => 'Допустимые форматы загрузки излбражения: jpeg, bmp, png!',
            'photo.max' => 'Допустимый размер файла 5мб !',
            'wide_photo.required' => 'Необходимо выбрать изображение',
            'wide_photo.mimes' => 'Допустимые форматы загрузки излбражения: jpeg, bmp, png!',
            'wide_photo.max' => 'Допустимый размер файла 5мб !',
            'client_photo.required' => 'Необходимо выбрать изображение',
            'client_photo.mimes' => 'Допустимые форматы загрузки излбражения: jpeg, bmp, png!',
            'client_photo.max' => 'Допустимый размер файла 5мб !',
            'photo_uk.required' => 'Необходимо выбрать изображение',
            'photo_uk.mimes' => 'Допустимые форматы загрузки излбражения: jpeg, bmp, png!',
            'photo_uk.max' => 'Допустимый размер файла 5мб !',
            'wide_photo_uk.required' => 'Необходимо выбрать изображение',
            'wide_photo_uk.mimes' => 'Допустимые форматы загрузки излбражения: jpeg, bmp, png!',
            'wide_photo_uk.max' => 'Допустимый размер файла 5мб !',
            'client_photo_uk.required' => 'Необходимо выбрать изображение',
            'client_photo_uk.mimes' => 'Допустимые форматы загрузки излбражения: jpeg, bmp, png!',
            'client_photo_uk.max' => 'Допустимый размер файла 5мб !',
        ];
    }
}
