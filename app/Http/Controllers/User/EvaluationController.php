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
        return view('evaluation.index')->with('user', auth()->user());
    }

    public function drive(Trip $trip) {
        return view('evaluation.drive', compact('trip'));
    }

    public function passenger(Trip $trip) {
        return view('evaluation.passenger', compact('trip'));
    }

    public function store(Trip $trip, EvaluationRequest $request){
        try{
            $request['check_quality'] = serialize($request->check_quality);
            $request['user_from'] = auth()->user()->id;
            $request['user_to'] = $request->user_to;

            $trip->Evaluations()->create($request->all());

            return redirect()->back()->with('success', 'Avaliado com sucesso');
        }catch (\Exception $e){

            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }

    }
}
