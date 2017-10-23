<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Domains\Profile;
use Faker\Provider\Image;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    private $profile;

    public function __construct(Profile $profile){

        $this->middleware('auth');
        $this->profile = $profile;
    }

    public function index(){

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
            $request = $this->upload($request);
            auth()->user()->Profile()->create($request);
            return redirect(route('user.profile.index'));
        }catch (\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit(Profile $profile) {
        return view('profile.edit')->with('profile', $profile);
    }

    public function update(ProfileRequest $request, Profile $profile) {

        try{
            $request->file() ? $request = $this->upload($request) : $request = $request->input();
            $profile->update($request);
            return  back()->with('success', 'Alterado com sucesso!');
        }catch (\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function upload(ProfileRequest $request){

        $photo = $request->file('photo_address');

        if ($photo->isValid()) {
            $extension = $photo->getClientOriginalExtension();

            if($extension == 'jpg' || $extension == 'png' || $extension == 'jpeg'){

                $src = '/img/photos/';
                $destinationPath = public_path().$src;
                $fileName = 'profile-'.auth()->user()->id.'.'.$extension;
                $request->photo_address->move($destinationPath, $fileName);

                $this->resizeImg($extension);

                $photo_address = $src.$fileName;
                $request = $request->input()+['photo_address' =>$photo_address];
                return $request;
            }
            return back()->with('error', 'Esse Arquivo precisa ser do tipo JPG ou PNG');
        }
        throw new \Exception('Arquivo Invalido');
    }

    public function resizeImg(String $extension){
        $image = \Intervention\Image\Facades\Image::make(public_path().'/img/resize' .$extension);
        $image->resize(200,200);
        $image->save('public/upload/news/1.jpg');
    }


}
