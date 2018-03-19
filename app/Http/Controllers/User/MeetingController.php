<?php

namespace App\Http\Controllers\User;

use App\Domains\Meeting;
use App\Domains\Trip;
use App\Domains\Traits\MeetingTrait;
use App\Events\TripSubPassenger;
use App\Http\Controllers\Controller;
use App\Notifications\CreateMeeting;
use App\Notifications\ApprovedMeeting;
use App\Notifications\DisapprovedMeeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    use MeetingTrait;

    private $meeting;

    public function __construct(Meeting $meeting)
    {
        $this->middleware('auth');
        $this->meeting = $meeting;
    }

    public function store(Trip $trip){
        try{
            $this->verifyTrips($trip);

            $meeting = auth()->user()->Meetings()->create(['trip_id'=> $trip->id]);

            $trip->User->notify(new CreateMeeting($meeting));

            return back()->with('success', "Solicitação enviada");

        }catch (\Exception $e){

            return back()->with('error', $e->getMessage());
        }
    }

    public function show(Trip $trip){

        return view('meeting.show', compact('trip'));
    }

    public function accept(Request $request){

        try{
            $meeting = $this->meeting->find($request->meeting_id);
            event(new TripSubPassenger($meeting->Trip));
            $meeting->update(['accept' => $request->accept]);

            if($request->accept){
                $meeting->User->notify(new ApprovedMeeting($meeting));
                $message =  $meeting->User->Profile->name." agora faz parte da sua viagem!!";
            }else{
                $meeting->User->notify(new DisapprovedMeeting($meeting));
                $message = $meeting->User->Profile->name." não irá com você";
                $this->delete($meeting);
            }

            if($request->ajax())
            {
                return response()->json([
                    'message' => $message,
                    'data' => $meeting,
                    'status' => 200
                ], 200);
            }

        }catch (\Exception $e){

            if($request->ajax())
            {
                return response()->json([
                    'message' => $e->getMessage(),
                    'status' => 400
                ], 400);
            }

            return back()->with('error', $e->getMessage());
        }
    }

    private function delete(Meeting $meeting){
        $meeting->delete();
    }

}
