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
        return view('trip.my_trip')->with(['trips' => auth()->user()->Trips()->orderBy('id', 'desc')->get()]);
    }

    public function getValidationDate(Carbon $dateNow, Carbon $dateRequest, Carbon $dateTrip){

        if($dateRequest < $dateNow){
            throw new \Exception("Datas anteriores a dia e hora atual não são válidas");
        }

//        if($dateRequest->toDateString() == $dateNow->toDateString()){
//
//            dd($dateRequest->diffInHours($dateTrip));
//
//        }


        // criar police ou gate para verificar se ainda é possivel alterar a viagem,
        // definir um tempo minimo ed antecedencia para realizar alteração
        // criar evento de notificação

    }


}