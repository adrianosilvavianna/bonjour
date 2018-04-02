<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

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

    public function resetPassword(Request $request){
        $validate = $request->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);

        auth()->user()->password = bcrypt($validate['password']);
        auth()->user()->save();
        return redirect()->back()->with('success', 'Senha alterada com sucesso');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'terms_use' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }


}
