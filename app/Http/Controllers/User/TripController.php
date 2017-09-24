<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class TripController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        if(auth()->User()->Profile){
            return view('trip.index')->with('trip', auth()->user()->Profile);
        }
        return view('trip.create');
    }

    public function create() {
        return view('trip.create');
    }

    public function store(ProfileRequest $request) {

        auth()->user()->Profile()->create($request->input());

        return redirect(route('user.trip.index'));
    }

    public function edit(Profile $trip) {

        return view('trip.edit')->with('trip', $trip);
    }

    public function update(ProfileRequest $request, Trip $trip) {
        $trip->update($request->input());
        return view('trip.edit');
    }

    public function upload(Request $request,Trip $trip)
    {
        if ($request->file->isValid()) {

            $path   = $request->file->store('comprovantes');

            $trip->paid_at  = date('Y-m-d');
            $trip->src_file = $path;
            $trip->save();

            return back()->with('success','Enviado');
        }

        return back()->with('errors', 'Arquivo Invalido');

    }
}
