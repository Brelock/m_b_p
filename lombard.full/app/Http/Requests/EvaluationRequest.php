<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvaluationRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'comment' => ['required', 'string'],
            'phone' => ['required', 'string']
        ];
    }

    /**
     * Prepare date before validation ()
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'comment' => (string) implode(',', $this->comment),
        ]);
    }
//
//    /**
//     * @param \Illuminate\Contracts\Validation\Validator $validator
//     */
//    protected function failedValidation($validator)
//    {
//        dd($validator->errors());
//    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'comment.required' => 'Выберите вариант',
            'phone.required' => 'Укажите номер телефона',
            'phone.numeric' => 'Данное поле не соответствует формату телефона',
        ];
    }
}
