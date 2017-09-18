<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class MeetingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}
