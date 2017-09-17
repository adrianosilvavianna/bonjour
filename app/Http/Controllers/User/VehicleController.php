<?php

namespace App\Http\Controllers\User;

use App\Domains\Vehicle;
use App\Http\Controllers\Controller;
use App\Http\Requests\PhoneRequest;
use App\Domains\Phone;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    private $vehicle;

    public function __construct(Vehicle $vehicle)
    {
        $this->middleware('auth');
        $this->vehicle = $vehicle;
    }

    public function index()
    {
        return view('vehicle.index');
    }

    public function create() {
        return view('vehicle.create');
    }

    public function edit(Phone $phone) {
        return view('phone.edit')->with('phone', $phone);
    }

    public function store(PhoneRequest $request) {
        $this->profile->create($request);
        return view('phone.index')->with('success', config('alert.message.success'));
    }

    public function update(PhoneRequest $request, Phone $phone) {
        $phone->update($request->input());
        return view('phone.edit')->with('success', config('alert.message.success'));
    }

    public function upload(Request $request, Phone $phone)
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
