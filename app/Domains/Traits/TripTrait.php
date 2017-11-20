<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 25/10/2017
 * Time: 15:06
 */

namespace App\Domains\Traits;


use App\Domains\Trip;
use Carbon\Carbon;
use Illuminate\Http\Request;

trait TripTrait
{

    public function search(Request $request){

        if($request->date_trip != '' && $request->location != '') {
            return view('trip.index')->with(['trips' => $this->trip->where('date' ,'=' ,$request->date_trip)->where('exit_address', 'like', '%'.$request->location.'%')->orWhere('arrival_address', 'like', '%'.$request->location.'%s')->get()]);
        }
        if($request->date_trip != ''){
            return view('trip.index')->with(['trips' => $this->trip->where('date' ,'=' ,$request->date_trip)->get()]);
        }
        if($request->location != ''){
            return view('trip.index')->with(['trips' => $this->trip->where('exit_address', 'like', '%'.$request->location.'%')->orWhere('arrival_address', 'like', '%'.$request->location.'%')->get()]);
        }

        return view('trip.index')->with(['trips' => $this->trip->where('date' ,'=' ,$request->date_trip)->get()]);
    }

    public function myTrips(){
        $trip = auth()->user()->Trips();
        $tripsPending = $trip->where('status', '=', true)->orderBy('id', 'desc')->get();
        $tripsFinished  = $trip->where('status', '=', false)->orderBy('id', 'desc')->get();
        $tripsCanceled  = $trip->where('canceled', '=', true)->orderBy('id', 'desc')->get();

        return view('trip.my_trip')->with(['tripsPending' => $tripsPending, 'tripsFinished' => $tripsFinished, 'tripsCanceled' => $tripsCanceled]);
    }

    public function getValidationDate(Carbon $dateNow, Carbon $dateRequest, Carbon $dateTrip){

        //se a data atual for menor que a data da viagem

        if($dateNow->toDateTimeString() <= $dateTrip->subHours(1)->toDateTimeString()){

            if($dateRequest->diffInHours($dateTrip->addHours(1)) > 1){
                return true;
            }
            throw new \Exception("É necessario 3hr de diferença para seus passageiros se adaptarem a mudança");
        }
        throw new \Exception("TEMPO ESGOTADO - É necessario 3hr de diferença para seus passageiros se adaptarem a mudança. Não é mais possível alterar esta viagem");

    }


}