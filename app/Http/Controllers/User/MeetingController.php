<?php

namespace App\Http\Controllers\User;

use App\Domains\Trip;
use App\Http\Controllers\Controller;
use App\Notifications\ApprovedMeeting;
use App\Notifications\CreateMeeting;
use App\Notifications\DisapprovedMeeting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Notification;

class MeetingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Trip $trip){
        try{
            $this->verifyTrips($trip);
            $meeting = auth()->user()->Meetings()->create(['trip_id'=> $trip->id]);

            $trip->User->notify(new CreateMeeting($meeting));

            return back()->with('success', "Atualizado com sucesso");

        }catch (\Exception $e){

            return back()->with('error', $e->getMessage());
        }
    }

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
            $meeting->delete();
            return back()->with('success', 'Reserva Cancelada');

        }catch (\Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }

    public function show(Trip $trip){
        // falta localizar quem esta egando carona.. uma vez que nao tem autenticação
        return view('meeting.show', compact($trip));
    }

    public function approved(Request $request ,Trip $trip){

        try{
            $meeting = $this->searchMettingAuthUser($trip);
            $meeting = $meeting->update(['approved' => $request->approved]);

            if($meeting->approved){
                $meeting->User->notify(new ApprovedMeeting($meeting));
                return back()->with('success', 'Reserva Aprovada');
            }else{
                $meeting->User->notify(new DisapprovedMeeting($meeting));
                return back()->with('warning', 'Reserva Reprovada');
            }

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
