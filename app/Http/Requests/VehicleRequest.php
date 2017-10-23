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
        switch($this->method())
        {
            case 'POST':
            {
                return [
                    'model' => 'required|string|max:40',
                    'color' => 'required|string|max:40',
                    'plaque' => 'required|string',
                    'year' => 'required|string',
                    'brand' => 'required',
                    'num_passenger' => 'required|min:1|max:20',
                ];
            }
            case 'PUT':{
                return [
                    'model' => 'required|string|max:40',
                    'color' => 'required|string|max:40',
                    'plaque' => 'required|string',
                    'year' => 'required|string',
                    'brand' => 'required',
                    'num_passenger' => 'required|min:1|max:20',
                ];
            }
            default:break;
        }
    }
}
