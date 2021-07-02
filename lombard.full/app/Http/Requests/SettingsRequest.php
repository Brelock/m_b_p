<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
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
            'email' => 'email|min:6',
            'phone' => 'max:14',
            'viber' => 'max:14',
            'title_ru' => ['string', 'nullable'],
            'title_uk' => ['string', 'nullable'],
            'description_ru' => ['string', 'nullable'],
            'description_uk' => ['string', 'nullable'],
            'button_ru' => ['string', 'nullable'],
            'button_uk' => ['string', 'nullable'],
            'link' => ['string', 'nullable'],
            'link_uk' => ['string', 'nullable']
        ];
    }

    public function messages()
    {
        return [
            'email.email' => 'Не корректный e-mail',
            'email.min'   => 'Слишком короткий e-mail',
            'phone.max'   => 'Максимальный размер номера телефона - 14 символов',
            'viber.max'   => 'Максимальный размер Viber - 14 символов',
            'title_ru.string' => 'Неверный формат данных',
            'title_uk.string' => 'Неверный формат данных',
            'description_ru.string' => 'Неверный формат данных',
            'description_uk.string' => 'Неверный формат данных',
            'button_ru.string' => 'Неверный формат данных',
            'button_uk.string' => 'Неверный формат данных',
            'link.string' => 'Неверный формат данных',
            'link_uk.string' => 'Неверный формат данных'
        ];
    }
}
