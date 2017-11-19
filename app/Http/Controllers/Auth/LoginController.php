<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');

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
}
