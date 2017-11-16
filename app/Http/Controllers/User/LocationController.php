<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Domains\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    private $location;

    public function __construct(Location $location)
    {
        $this->location = $location;
    }

    public function index(){
        return view('location.index');
    }

    public function create(){
        return view('location.create');
    }

    public function store(Request $request)
    {
        auth()->user()->Location()->create($request->input());
        return redirect()->back()->with('success', 'Localização salva com sucesso!');
    }

    public function delete(Location $location)
    {
        $location->delete();
        return redirect()->back()->with('success', 'Localização excluída com sucesso!');
    }
}
