<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use App\Events\EventCreateMeeting;
use App\Events\EventTripPassenger;
use App\Listeners\ListenerCreateMeeting;
use App\Listeners\ListenerEventTripPassenger;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [

        EventCreateMeeting::class => [ListenerCreateMeeting::class],
        EventTripPassenger::class => [ListenerEventTripPassenger::class]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
