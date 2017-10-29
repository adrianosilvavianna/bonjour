<?php

namespace App\Http\Controllers\User;

use App\Domains\Trip;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class MeetingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Trip $trip){

        try{

            $this->verifyTrips($trip);
            auth()->user()->Mettings()->create(['trip_id'=> $trip->id]);
            return back()->with('success', "Atualizado com sucesso");

        }catch (\Exception $e){

            return back()->with('error', $e->getMessage());
        }
    }

    public function verifyTrips(Trip $trip){

        $allTrips = auth()->user()->Meetings->where('date', '=', $trip->date);

        if($allTrips->count() > 0){

            foreach($allTrips as $allTrip){

                $dateTrip = Carbon::parse($trip->date.$trip->time);

                $dateAllTrip = Carbon::parse($allTrip->date.$trip->time);

                if($dateTrip->diffInMinutes($dateAllTrip) <= 30){
                    throw new \Exception("Você já tem uma carona próximo a esse horario");
                }

            }
        }

    }
}
