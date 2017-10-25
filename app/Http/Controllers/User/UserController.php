<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('profile');
    }
    

}
