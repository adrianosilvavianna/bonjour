<?php

namespace App\Http\Controllers\User;

use App\Domains\Evaluation;
use App\Domains\Meeting;
use App\Domains\Trip;
use App\Http\Controllers\Controller;
use App\Http\Requests\EvaluationRequest;
use App\User;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        return view('evaluation.index')->with('meetings', auth()->user()->Meetings);
    }

    public function drive(Trip $trip) {
        return view('evaluation.drive', $trip);
    }

    public function passenger(Trip $trip) {
        return view('evaluation.passenger', compact('trip'));
    }

    public function store(Trip $trip, EvaluationRequest $request){
        try{
            $request['meeting_id'] = Meeting::where('trip_id', '=', $trip->id)->where('user_id', '=', auth()->user()->id)->first()->id;
            $request['check_quality'] = serialize($request->check_quality);

            Evaluation::create($request->all());
            if($request->ajax())
            {
                return response()->json([
                    'message' => "Passageiro avaliado com sucessso",
                    'data' => '',
                    'status' => 200
                ], 200);
            }
            return redirect()->back()->with('success', 'Avaliado com sucesso');
        }catch (\Exception $e){
            if($request->ajax())
            {
                return response()->json([
                    'message' => "Ops algo deu errado",
                    'data' => $e->getMessage(),
                    'status' => $e->getCode()
                ], 200);
            }
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }

    }
}
