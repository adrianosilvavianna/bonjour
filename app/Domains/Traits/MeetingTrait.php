<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 25/10/2017
 * Time: 15:06
 */

namespace App\Domains\Traits;

use App\Domains\Trip;
use App\Events\TripAddPassenger;
use App\Notifications\CancelMeeting;
use Illuminate\Support\Carbon;

trait MeetingTrait
{

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

        try{
            $meeting = $this->searchMettingAuthUser($trip);
            $user = $meeting->User;
            $meeting->delete();
            event(new TripAddPassenger($trip));
            $trip->User->notify(new CancelMeeting($trip, $user));

            return back()->with('success', 'Reserva Cancelada');

        }catch (\Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }

    public function searchMettingAuthUser(Trip $trip){

        foreach($trip->Meetings as $meeting)
        {
            if($meeting->user_id == auth()->user()->id) {
                return $meeting;
            }
        }
        throw new \Exception("Usuário não está comprometido a esta viagem");

    }

}