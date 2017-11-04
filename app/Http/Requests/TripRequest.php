<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TripRequest extends FormRequest
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
        switch($this->method())
        {
            case 'POST':
            {
                return [
                    'exit_address'    => 'required|string|max:255',
                    'arrival_address' => 'required|string|max:255',
                    'date'            => 'required|date',
                    'time'            => 'required',
                    'vehicle_id'      => 'required|integer',
                    'num_passenger'   => 'required|integer'
                ];
            }
            case 'PUT':{
                return [
                    'date'            => 'required|date',
                    'time'            => 'required',
                    'vehicle_id'      => 'required|integer'
                ];
            }
            default:break;
        }
    }
}
