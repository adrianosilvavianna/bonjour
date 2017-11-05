<?php

namespace App\Listeners;

use App\Domains\Trip;
use App\Events\EventTripPassenger;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ListenerEventTripPassenger
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    private $trip;

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
    public function handle(EventTripPassenger $event)
    {
        dd($event->getTrip()->num_passenger);
    }
}
