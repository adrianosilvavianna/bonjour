<?php

namespace App\Http\Controllers\Auth;

use App\Domains\Config;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/user/trip';
    private $langPtBr = __DIR__."../../../../Lang/pt-br.php";
    private $langEn = __DIR__."../../../../Lang/en.php";
    private $langFr = __DIR__."../../../../Lang/fr.php";
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');

        if(!empty($_GET['lang']))
        {
            switch($_GET['lang']){
                case "pt-br":
                    include_once $this->langPtBr;
                    break;
                case "en":
                    include_once $this->langEn;
                    break;
                case "fr":
                    include_once $this->langFr;
                    break;
                default:
                    include_once $this->langPtBr;
                    break;
            }
        }
        else{
            include_once $this->langPtBr;
        }

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'terms_use' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'terms_use' => $data['terms_use'],
            'password' => bcrypt($data['password']),
        ]);

        $user->Config()->create(['lang' => 'pt-br']);

        return $user;
    }
}
