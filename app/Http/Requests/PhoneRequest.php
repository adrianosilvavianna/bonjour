<?php
/**
 * Created by PhpStorm.
 * User: Adriano
 * Date: 17/09/2017
 * Time: 11:30
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhoneRequest extends  FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
       return [
            'phone' => 'required|string',
        ];
    }
}