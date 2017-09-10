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
        if(auth()->User()->Profile){
            return view('profile.index')->with('profile', auth()->user()->Profile);
        }
        return view('profile.create');
    }

    public function create() {
        return view('profile.create');
    }

    public function edit(Profile $profile) {

        return view('profile.edit')->with('profile', $profile);
    }

    public function store(ProfileRequest $request) {
        $this->profile->create($request);
        return view('profile.index')->with('success', config('alert.message.success'));
    }

    public function update(ProfileRequest $request, Profile $profile) {
        $profile->update($request->input());
        return view('profile.edit')->with('success', config('alert.message.success'));
    }

    public function upload(Request $request,Profile $profile)
    {
        if ($request->file->isValid()) {

            $path   = $request->file->store('comprovantes');

            $bank->paid_at  = date('Y-m-d');
            $bank->src_file = $path;
            $bank->save();

            return back()->with('success','Enviado');
        }

        return back()->with('errors', 'Arquivo Invalido');

    }

}
