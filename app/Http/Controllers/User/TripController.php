<?php

namespace App\Http\Controllers\User;

use App\Domains\Traits\TripTrait;
use App\Domains\Trip;
use App\Events\TripCanceled;
use App\Http\Controllers\Controller;
use App\Http\Requests\TripRequest;
use Carbon\Carbon;

class TripController extends Controller
{
    private $trip;

    use TripTrait;

    public function __construct(Trip $trip)
    {
        $this->middleware('auth');
        $this->middleware('vehicle')->only('create');
        $this->middleware('profile');
        $this->trip = $trip;
    }

    public function index()
    {
        $dataNow = Carbon::now();
        return view('trip.index')->with('trips', $this->trip->where('date', '>=', $dataNow)->orderBy('id', 'desc')->get());
    }

    public function create() {
        return view('trip.create')->with(['vehicles' => auth()->user()->Vehicles->all()]);
    }


    public function store(TripRequest $request) {
        try{
            auth()->user()->Trips()->create($request->input());
            $this->getSuccessAjax($request);
        }catch (\Exception $e){
            $this->getErrorAjax($request, $e);
        }
    }

    public function edit(Trip $trip) {
        return view('trip.edit')->with(['vehicles' => auth()->user()->Vehicles->all(), 'trip' => $trip]);
    }

    public function update(TripRequest $request ,Trip $trip) {
        try{
            $dateNow = Carbon::now();
            $dateRequest = Carbon::parse($request->date.$request->time);
            $dateTrip = Carbon::parse($trip->date.$trip->time);

            if($this->getValidationDate($dateNow, $dateRequest, $dateTrip)){
                $trip->update($request->input());
                return back()->with('success', "Atualizado com sucesso");
            }
        }catch (\Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }

    public function show(Trip $trip){
        return view('trip.show', compact('trip'));
    }

    public function canceled(Trip $trip){
        try{
           event(new TripCanceled($trip));
           return back()->with('success', "Viagem cancelado e passageiros notificados com sucesso");
        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }

    public function getSuccessAjax($request){
        if($request->ajax())
        {
            return response()->json([
                'message' => 'Sucesso',
                'status' => 200
            ], 200);
        }
    }

    public function getErrorAjax($request, $e){
        if($request->ajax())
        {
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 400
            ], 200);
        }
    }
}
