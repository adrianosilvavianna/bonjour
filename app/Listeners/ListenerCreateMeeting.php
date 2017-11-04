<?php

namespace App\Listeners;

use App\Events\EventCreateMeeting;
use App\Notifications\CreateMeeting;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ListenerCreateMeeting
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
    public function handle(EventCreateMeeting $event)
    {
        $event->getMeeting()->Trip->User->notify(new CreateMeeting($event->getMeeting()));
    }
}
