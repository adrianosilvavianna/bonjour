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
        return view('vehicle.index');
    }

    public function create() {
        return view('vehicle.create');
    }

    public function edit(Vehicle $vehicle) {
        return view('vehicle.edit', compact('vehicle'));
    }

    public function store(VehicleRequest $request) {
        $this->vehicle->create($request->input());
    }

    public function update(VehicleRequest $request, Vehicle $vehicle) {
        $vehicle->update($request->input());
        return redirect()->back()->with('vehicle', $vehicle);
    }

    public function delete(Vehicle $vehicle) {
        $vehicle->delete();
    }
}
