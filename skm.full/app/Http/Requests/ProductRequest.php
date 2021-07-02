<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            'title' => 'required',
            //'price' => 'required|numeric',
            //'image.*' => 'image|mimes:jpeg,jpg,png',
            //'photo' => 'image|mimes:jpeg,bmp,png|max:5000',
            //'photo_collection.*' => 'image|mimes:jpeg,bmp,png|max:5000',
        ];
    }

}
