<?php

namespace App\Http\Middleware;

use Closure;

class TranslateApp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

     private $langPtBr = __DIR__."../../../Lang/pt-br.php";
     private $langEn = __DIR__."../../../Lang/en.php";
     private $langFr = __DIR__."../../../Lang/fr.php";


    public function handle($request, Closure $next)
    {
         switch(auth()->user()->Config->lang){
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

      return $next($request);

    }
}
