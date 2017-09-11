<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
         return [
             'name' => 'required|string|max:40',
             'last_name' => 'required|string|max:40',
             'age' => 'required|integer|max:2',
             'genre' => 'required',
             'photo_address' => 'image'
        ];
    }
}
