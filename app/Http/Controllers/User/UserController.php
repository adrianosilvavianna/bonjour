<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('profile');
    }

    public function update(UserRequest $request){

        auth()->user()->update($request->input());
        return back()->with('success', 'Atualizado com sucesso!');
    }


}
