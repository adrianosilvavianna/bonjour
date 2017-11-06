<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TripSubPassengerListener
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
        if($trip->num_passenger){
            $trip->num_passenger -= 1;
            $trip->save();
        }else{
            throw new \Exception("Não há mais vaga nesta viagem :/");
        }
    }
}
