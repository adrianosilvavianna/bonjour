<?php

namespace App\Http\Controllers\User;

use App\Domains\Trip;
use App\Domains\VehicleTrip;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TripController extends Controller
{
    private $trip;

    public function __construct(Trip $trip)
    {
        $this->middleware('auth');
        $this->middleware('vehicle')->only('create');
        $this->trip = $trip;
    }
    
    public function index()
    {
        return view('trip.index')->with('trips', auth()->user()->Trips()->orderBy('id', 'desc')->get());
    }

    public function create() {
        return view('trip.create')->with(['vehicles' => auth()->user()->Vehicles->all()]);
    }


    public function store(Request $request) {

        try{

            $trip = auth()->user()->Trips()->create($request->input());

            if($request->ajax())
            {
                return response()->json([
                    'message' => 'Sucesso',
                    'data' => $trip,
                    'status' => 200
                ], 200);
            }

        }catch (\Exception $e){
            if($request->ajax())
            {
                return response()->json([
                    'message' => $e->getMessage(),
                    'status' => 400
                ], 200);
            }
        }

    }

    public function edit() {
        return view('trip.edit');
    }

    public function update() {

    }

    public function show(Trip $trip){
        return view('trip.show', compact('trip'));
    }


    public function delete(){

    }
}
