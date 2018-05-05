<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class SocialAuthController extends Controller
{
    public function entrarFacebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function retornoFacebook(){
        $userSocial = Socialite::driver('facebook')->user();
        $email = $userSocial->getEmail();

        if(Auth::check()){
            $user = auth()->user();
            $user->facebook = $email;
            $user->save();
            return redirect()->intended('/user/trip');
        }

        $user = User::where('facebook', $email);

        if(isset($user->name)){
            Auth::login($user);
            return redirect()->intended('/user/trip');
        }

        if(User::where('email', $email)->count()){
            $user = User::where('email', $email)->first();
            $user->facebook = $email;
            $user->save();
            Auth::login($user);
            return redirect()->intended('/user/trip');
        }

        $user = new User();
        $user->name = $userSocial->getName();
        $user->email = $userSocial->getEmail();
        $user->facebook = $userSocial->getEmail();
        $user->password = bcrypt($userSocial->token);
        $user->save();
        $user->Profile()->create(['name' => $userSocial->getName(), 'photo_address' => $userSocial->getAvatar()]) ;
        $user->Config()->create(['lang' => 'pt-br']);
        Auth::login($user);
        return redirect()->intended('/user/trip');

    }

    public function entrarGithub(){
        return Socialite::driver('github')->redirect();
    }

    public function retornoGithub(){
        $userSocial = Socialite::driver('github')->user();
        $email = $userSocial->getEmail();

        if(Auth::check()){
            $user = auth()->user();
            $user->github = $email;
            $user->save();
            return redirect()->intended('/user/trip');
        }

        $user = User::where('github', $email);

        if(isset($user->name)){
            Auth::login($user);
            return redirect()->intended('/user/trip');
        }

        if(User::where('email', $email)->count()){
            $user = User::where('email', $email)->first();
            $user->github = $email;
            $user->save();
            Auth::login($user);
            return redirect()->intended('/user/trip');
        }

        $user = new User();
        $user->name = $userSocial->getNickname();
        $user->email = $userSocial->getEmail();
        $user->github = $userSocial->getEmail();
        $user->password = bcrypt($userSocial->token);
        $user->save();
        $user->Profile()->create(['name' => $userSocial->getName(), 'photo_address' => $userSocial->getAvatar()]) ;
        Auth::login($user);
        return redirect()->intended('/user/trip');

    }
}
