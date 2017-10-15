<?php

namespace App\Http\Controllers\User;

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

    public function create() {        
        return view('avaliation.create');
    }

    public function store(Request $request) {
        auth()->user()->Avaliation()->create($request->input());

        return redirect()->route('user.avaliation.index')->with('success', 'Salvo com sucesso!');
    }

    public function edit() {
        return view('avaliation.edit')->with('avaliation', $avaliation);
    }

    public function update() {
       $avaliation = $avaliation->update($request->input());
       return redirect()->route('user.avaliation.index')->with('success', 'Salvo com sucesso');
    }

    public function show(){

    }

    public function delete(){

    }
}
