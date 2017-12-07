<?php

namespace App\Http\Controllers\User;

use App\Domains\Trip;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AvaliationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        return view('avaliation.index')->with('avaliation', auth()->user()->Avaliation);
    }

    public function create(Trip $trip) {
        dd('Continua nos proximos captulos');
        //return view('avaliation.create');
    }

    public function store(Request $request) {
        auth()->user()->Avaliation()->create($request->input());

        return redirect()->route('user.avaliation.index')->with('success', 'Salvo com sucesso!');
    }
}
