<?php

namespace App\Http\Controllers\User;

use App\Domains\Evaluation;
use App\Domains\Trip;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        return view('evaluation.index');
    }

    public function drive(Trip $trip) {
        return view('evaluation.drive', $trip);
    }

    public function passenger(Trip $trip) {
        return view('evaluation.passenger', compact('trip'));
    }

    public function storePassenger(Trip $trip, User $user,  Request $request){
        try{
            $request['trip_id'] = $trip->id;
            $request['user_id'] = $user->id;

            Evaluation::create($request->all());
            if($request->ajax())
            {
                return response()->json([
                    'message' => "Passageiro avaliado com sucesso",
                    'data' => '',
                    'status' => 200
                ], 200);
            }
        }catch (\Exception $e){
            if($request->ajax())
            {
                return response()->json([
                    'message' => "Ops algo deu errado",
                    'data' => $e->getMessage(),
                    'status' => $e->getCode()
                ], 200);
            }
        }

    }

    public function store() {
        //usuario cadastra as notas
    }
}
