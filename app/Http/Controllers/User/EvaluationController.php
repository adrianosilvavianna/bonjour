<?php

namespace App\Http\Controllers\User;

use App\Domains\Trip;
use App\Http\Controllers\Controller;
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
        return view('evaluation.passenger', $trip);
    }

    public function store() {
        //usuario cadastra as notas
    }
}
