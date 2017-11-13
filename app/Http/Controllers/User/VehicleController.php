<?php

namespace App\Http\Controllers\User;

use App\Domains\Vehicle;
use App\Http\Controllers\Controller;
use App\Http\Requests\PhoneRequest;
use App\Domains\Phone;
use App\Http\Requests\VehicleRequest;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    private $vehicle;

    public function __construct(Vehicle $vehicle){
        $this->middleware('auth');
        $this->vehicle = $vehicle;
    }

    public function index(){
        return view('vehicle.index')->with('vehicles', auth()->user()->Vehicles);
    }

    public function create() {
        return view('vehicle.create');
    }

    public function store(VehicleRequest $request) {
      try{

        $vehicle = auth()->user()->Vehicles()->create($request->input());

        if($request->ajax())
        {
            return response()->json([
                'message' => "ok deu certo",
                'data' => $vehicle,
                'status' => 200
            ], 200);
        }

        return redirect()->route('user.vehicle.index')->with('success', 'Salvo com sucesso');
      }catch (\Exception $e){
        if($request->ajax())
        {
            return response()->json([
                'message' =>  $e->getMessage(),
                'data' => $e,
                'status' => 400
            ], 400);
        }
          return back()->with('error', $e->getMessage());
      }

    }

    public function edit(Vehicle $vehicle) {

        return view('vehicle.edit')->with('vehicle', $vehicle);
    }

    public function update(VehicleRequest $request, Vehicle $vehicle) {

        $vehicle->update($request->input());
       return redirect()->route('user.vehicle.index')->with('success', 'Salvo com sucesso');
    }

    public function delete(Vehicle $vehicle) {
        try{
            $vehicle->delete();
            return back()->with('success', 'Salvo com sucesso');
        }catch (\Exception $e){
            return back()->with('error', $e->getMessage());
        }

    }
}
