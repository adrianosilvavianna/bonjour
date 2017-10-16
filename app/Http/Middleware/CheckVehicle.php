<?php

namespace App\Http\Middleware;

use Closure;

class CheckVehicle
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

        if(auth()->user()->Vehicles->count() <= 0){
            return redirect()->route('user.vehicle.create')->with('info', 'É necessário cadastrar um veiculo.');
        }

        return $next($request);
    }
}
