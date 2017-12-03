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
            return redirect(route('user.profile.index'))->with('success', 'Alterado com sucesso!');
        }catch (\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    //metodo que faz o upload da imagem
    public function upload(ProfileRequest $request){

        $photo = $request->file('photo_address');

        if ($photo->isValid()) {
            $extension = $photo->getClientOriginalExtension();

            if($extension == 'jpg' || $extension == 'png' || $extension == 'jpeg'){

                //Declara uma url para img principal
                $src = '/img/photos/';
                $destinationPath = public_path().$src;
                $fileName = 'profile-'.auth()->user()->id.'.'.$extension;
                $request->photo_address->move($destinationPath, $fileName);

                $srcResize = $this->resizeImg($fileName, $src);

                //Salva o endereço da img renderizada
                $photo_address = $srcResize.$fileName;
                $request = $request->input()+['photo_address' =>$photo_address];

                return $request;
            }
            return back()->with('error', 'Esse Arquivo precisa ser do tipo JPG ou PNG');
        }
        throw new \Exception('Arquivo Invalido');
    }


    //metodo que renderiza a imagem
    public function resizeImg(String $fileName,String $src){

        $srcResize = '/img/resize/';
        $path = public_path().$srcResize.$fileName;

        $image = Image::make(public_path().$src.$fileName)->resize(200,200)->save($path);

        return $srcResize;

    }


}
