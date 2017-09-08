<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('profile.index');
    }
    
    public function create() {
        return view('profile.create');
    }
    
    public function store(Profile $profile) {
        dd('PROFILE');
    }
    
    public function edit() {
        return view('profile.edit');
    }
    public function update() {
        
    }
    
    public function delete() {
        return view('profile.delete');
    }
}
