<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
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
             'model' => 'required|string|max:40',
             'color' => 'required|string|max:40',
             'plaque' => 'require|string',
             'year' => 'require|string',
             'brand' => 'required',
             'num_passenger' => 'required',
        ];
    }
}
