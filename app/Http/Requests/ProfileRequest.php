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
        switch($this->method())
        {
            case 'POST':
            {
                return [
                    'name' => 'required|string|max:40',
                    'last_name' => 'required|string|max:40',
                    'age' => 'required|integer|min:18|max:90',
                    'gender' => 'required',
                    'photo_address' => 'required|file|image|mimes:jpeg,jpg,png'
                ];
            }
            case 'PUT':{
                return [
                    'name' => 'required|string|max:40',
                    'last_name' => 'required|string|max:40',
                    'age' => 'required|integer|min:18|max:90',
                    'gender' => 'required',
                    'photo_address' => 'file|image|mimes:jpeg,jpg,png'
                ];
            }
            default:break;
        }
    }
}
