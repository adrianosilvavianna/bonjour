<?php

namespace App\Listeners;

use App\Notifications\FinishTrip;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TripFinishListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $trip = $event->trip;
        $trip->status = false; //  status false significa que foi finalizada
        $trip->save();

        foreach($trip->Meetings as $meeting){
            $meeting->User->notify(new FinishTrip($meeting));
        }

    }
}
