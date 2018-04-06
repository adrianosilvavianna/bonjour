<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Domains\Profile;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    private $profile;

    public function __construct(Profile $profile){
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
            return redirect(route('user.profile.index'))->with('success', 'Perfil completo');
        }catch (\Exception $e){
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function edit(Profile $profile) {
        return view('profile.edit')->with('profile', $profile);
    }

    public function update(ProfileRequest $request, Profile $profile)
    {
        try {
            $request->file() ? $photo_address = $this->upload($request) : $photo_address = $request->input();
            $request = $request->input()+['photo_address' => $photo_address];
            $profile->update($request);
            return redirect(route('user.profile.index'))->with('success', 'Alterado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    //metodo que faz o upload da imagem
    public function upload(ProfileRequest $request){
        $photo = $request->file('photo_address');

        if($request->hasFile('photo_address') && $request->file('photo_address')->isValid()){
            $extension = $request->photo_address->extension();
            $nameFile ='profile-'.auth()->user()->id.'.'.$extension;

            $upload = $request->photo_address->storeAs('profiles', $nameFile);

            if ( !$upload ){
                return redirect()->back()->with('error', 'Falha ao fazer upload')->withInput();
            }

            $photo_storage = storage_path()."/app/profiles/".$nameFile;

            $photo_public = '/img/resize/'.$nameFile;

            Image::make($photo_storage)->resize(200,200)->save(public_path().$photo_public);

            return $photo_public;
        }
        throw new \Exception('Este tipo de arquivo nao é valido');

    }

    public function rotateRight(Profile $profile){
        $address = public_path().$profile->photo_address;
        Image::make($address)->rotate(-90)->save($address);
        return redirect()->back();
    }

    public function rotateLeft(Profile $profile){
        $address = public_path().$profile->photo_address;
        Image::make($address)->rotate(90)->save($address);
        return redirect()->back();
    }



}
