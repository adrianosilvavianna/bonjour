<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class MoreInformationController extends Controller
{
    public function listCountry(){
        return response()->json(listCountry());
    }
}
