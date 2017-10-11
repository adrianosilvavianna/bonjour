<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Domains\Profile;

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
        if(auth()->User()->Profile){
            return view('profile.index')->with('profile', auth()->user()->Profile);
        }
        return view('profile.create');
    }

    public function create() {
        return view('profile.create');
    }

    public function store(ProfileRequest $request) {

        try{
            $profile = auth()->user()->Profile()->create($request->input());
            $this->upload($request, $profile);
            return redirect(route('user.profile.index'));
        }catch (\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit(Profile $profile) {
        
        return view('profile.edit')->with('profile', $profile);
    }

    public function update(ProfileRequest $request, Profile $profile) {
        $profile = $profile->update($request->input());
       return redirect(route('user.profile.index'));
    }

    public function upload(ProfileRequest $request,Profile $profile)
    {

        if ($request->file('photo_address')->isValid()) {

            $path   = $request->photo_address->move(public_path('img/photos'));
            $profile->paid_at  = date('Y-m-d');
            $profile->src_file = $path;
            $profile->save();
        }

        throw new \Exception('Arquivo Invalido');

    }
}
