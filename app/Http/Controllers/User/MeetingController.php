<?php

namespace App\Http\Controllers\User;

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

    public function approved(Request $request){

        try{
            dd($request);
            if($request->ajax())
            {
                return response()->json([
                    'message' => 'Sucesso',
                    'data' => '',
                    'status' => 200
                ], 200);
            }

//            $meeting = $this->searchMettingAuthUser($trip);
//            $meeting = $meeting->update(['approved' => $request->approved]);
//
//            if($meeting->approved){
//                $meeting->User->notify(new ApprovedMeeting($meeting));
//                return back()->with('success', 'Reserva Aprovada');
//            }else{
//                $meeting->User->notify(new DisapprovedMeeting($meeting));
//                return back()->with('warning', 'Reserva Reprovada');
//            }
        }catch (\Exception $e){

            if($request->ajax())
            {
                return response()->json([
                    'message' => $e->getMessage(),
                    'status' => 400
                ], 200);
            }

            return back()->with('error', $e->getMessage());
        }
    }

}
