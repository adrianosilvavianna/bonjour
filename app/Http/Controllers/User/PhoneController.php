<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhoneRequest;
use App\Domains\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    private $phone;

    public function __construct(Phone $phone) {
        $this->middleware('auth');
        $this->phone = $phone;
    }

    public function index() {
        return view('phone.index', ['phones' =>  auth()->user()->Phones]);
    }

    public function create() {
        return view('phone.create');
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
}
