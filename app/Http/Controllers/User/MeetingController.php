<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\MeetingRequest;

class MeetingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(MeetingRequest $request){

        auth()->user()->Mettings($request->input());
        return back()->with('success', "Atualizado com sucesso");

    }

}
