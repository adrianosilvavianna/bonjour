<?php

namespace App\Http\Controllers\User;

use App\Domains\Traits\MeetingTrait;
use App\Domains\Trip;
use App\Events\TripSubPassenger;
use App\Http\Controllers\Controller;
use App\Notifications\CreateMeeting;

class MeetingController extends Controller
{
    use MeetingTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Trip $trip){
        try{
            $this->verifyTrips($trip);
            event(new TripSubPassenger($trip));
            $meeting = auth()->user()->Meetings()->create(['trip_id'=> $trip->id]);

            $trip->User->notify(new CreateMeeting($meeting));

            return back()->with('success', "Atualizado com sucesso");

        }catch (\Exception $e){

            return back()->with('error', $e->getMessage());
        }
    }

    public function show(Trip $trip){

        return view('meeting.show', compact('trip'));
    }


}
