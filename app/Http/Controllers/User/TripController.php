<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class TripController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
}
