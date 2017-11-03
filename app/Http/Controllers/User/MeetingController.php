<?php

namespace App\Http\Controllers\User;

use App\Domains\Trip;
use App\Http\Controllers\Controller;
use App\Notifications\CreateMeeting;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Notification;

class MeetingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Trip $trip){

        try{
            $this->verifyTrips($trip);
            auth()->user()->Meetings()->create(['trip_id'=> $trip->id]);

            $trip->User->notify(new CreateMeeting($trip));

            return back()->with('success', "Atualizado com sucesso");

        }catch (\Exception $e){

            return back()->with('error', $e->getMessage());
        }
    }

    public function verifyTrips(Trip $trip){

        $meetings = auth()->user()->Meetings;

        if($meetings->count() > 0){

            foreach($meetings as $meeting){

                $dateTrip = Carbon::parse($trip->date.$trip->time);

                $dateAllTrip = Carbon::parse($meeting->Trip->date.$meeting->Trip->time);

                if($dateTrip->diffInMinutes($dateAllTrip) <= 30){
                    throw new \Exception("Você já tem uma carona próximo a esse horario");
                }

            }
        }
    }

    public function cancel(Trip $trip){

        foreach($trip->Meetings as $meeting)
        {
            if($meeting->user_id == auth()->user()->id) {

                $meeting->delete();
                return back()->with('success', 'Reserva Cancelada');

            }
        }
    }
}
