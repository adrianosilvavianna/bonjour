<?php

namespace App\Http\Controllers\User;

use App\Domains\Config;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConfigRequest;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    private $config;

    public function __construct(Config $config){
        $this->middleware('auth');
        $this->config = $config;
    }

    public function index(){
        return view('config.index');
    }

    public function create() {
        return view('config.edit');
    }

    public function update(Request $request) {

        $user = auth()->user();
        $config = $user->Config()->update($request->input());

        if($request->ajax())
        {
            return response()->json([
                'message' => "",
                'data' => $config,
                'status' => 200
            ], 200);
        }
    }


}
