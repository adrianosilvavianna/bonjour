<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialite;

class SocialAuthController extends Controller
{
    public function entrarFacebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function retornoFacebook(){
        $userSocial = Socialite::drive('facebook')->user();
        $email = $userSocial->getEmail();

        if(Auth::check()){
            $user = auth()->user();
            $user->facebook = $email;
            $user->save();
            return redirect()->intended('/home');
        }

        $user = User::where('facebook', $email);

        if(isset($user->name)){
            Auth::login($user);
            return redirect()->intended('/home');
        }

        if(User::where('email', $email)->count()){
            $user = User::where('email', $email)->first();
            $user->facebook = $email;
            $user->save();
            Auth::login($user);
            return redirect()->intended('/home');
        }

        $user = new User();
        $user->name = $userSocial->getNickname();
        $user->email = $userSocial->getEmail();
        $user->facebook = $userSocial->getEmail();
        $user->password = bcrypt($userSocial->token);
        $user->save();
        Auth::login($user);
        return redirect()->intended('/home');

    }
}
