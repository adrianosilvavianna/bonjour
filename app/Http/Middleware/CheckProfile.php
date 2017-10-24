<?php

namespace App\Http\Middleware;

use Closure;

class CheckProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(!auth()->user()->Profile){
            return redirect()->route('user.profile.create')->with('info', 'É necessário cadastrar seu perfil.');
        }

        return $next($request);
    }
}
