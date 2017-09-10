<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private $profile;

    public function __construct(Profile $profile)
    {
        $this->middleware('auth');
        $this->profile = $profile;
    }

    public function index()
    {
        return view('profile.index');
    }
    public function create() {
        return view('profile.create');
    }
    
    public function store(ProfileRequest $request) {
        $this->profile->create($request);
        return view('profile.index')->with('success', config('alert.message.success'));
    }
    
    public function edit(Profile $profile) {
        return view('profile.edit')->with('profile', $profile);
    }

    public function update(ProfileRequest $request, Profile $profile) {
        $profile->update($request->input());
        return view('profile.edit')->with('success', config('alert.message.success'));
    }
    
    public function delete(Profile $profile) {
        $profile->delete();
        return redirect()->back()->with('success', config('alert.message.success'));
    }
}
