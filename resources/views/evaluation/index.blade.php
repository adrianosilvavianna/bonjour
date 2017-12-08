@extends('layouts.app')

@section('content')

    <style>
        .card img {
            width: 10%;
            height: auto;
            margin-bottom: 1%;
        }
        p{
            height: auto;
        }
    </style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card card-stats">
                    <div class="card-content">
                        <img class="pull-left" src="{{ asset(auth()->user()->Profile->photo_address) }}" style="border-radius: 50%" >
                        <h3 class="pull-left" style="margin-left: 5%">{{ auth()->user()->Profile->name }} {{ auth()->user()->Profile->last_name }} <br>
                            <i class="material-icons pull-left">star</i>
                            <i class="material-icons pull-left">star</i>
                            <i class="material-icons pull-left">star</i>
                            <i class="material-icons pull-left">star_half</i>
                            <i class="material-icons pull-left">star_border</i>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Thallyta Vianna</h4>
                        <p class="category"></p>
                    </div>
                    <div class="card-content">
                        Bom motorista
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

