<?php

namespace App\Listeners;

use App\Notifications\CanceledTrip;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TripCanceledListener
{
    /**
     * Create the event listener.
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

        foreach($trip->Meetings as $meeting){
            $meeting->User->notify(new CanceledTrip($meeting));
        }
    }
}
