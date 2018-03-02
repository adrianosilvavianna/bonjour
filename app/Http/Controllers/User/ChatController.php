<?php

namespace App\Http\Controllers\User;

use App\Events\ChatEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Domains\Profile;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ChatController extends Controller
{

    public function index(){
        return view('chat.index');
    }

    public function send(Request $request){
        $user = auth()->user();
        event(new ChatEvent($request->message, $user));
    }
}
