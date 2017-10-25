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

    <form action="{{ route('user.trip.search') }}" method="post"  class="navbar-form navbar-right" role="search" >

        <div class="form-group ">
            <label for="location" >Busque por local: </label>
            <input type="text" class="form-control " id="location" name="location" placeholder="">
        </div>
        <div class="form-group ">
            <label for="date" >Busque por data: </label>
            <input type="date" class="form-control right " id="date" name="date_trip">
            <span class="material-input"></span>
        </div>


        <button type="submit" class="btn btn-white btn-round btn-just-icon">
            <i class="material-icons">search</i><div class="ripple-container"></div>
        </button>
    </form>


    <div class="container-fluid">

    @foreach($trips as $trip)

    <div class="row">
        <a href="{{ route('user.trip.show', $trip) }}">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card card-stats">
                    <div class="card-content">
                        <img class="pull-left" src="{{ asset($trip->User->Profile->photo_address) }}" style="border-radius: 50%" >
                        <h3 class="pull-left" style="margin-left: 5%">{{ $trip->User->Profile->name }} {{ $trip->User->Profile->last_name }} <br>
                            <i class="material-icons pull-left">star</i>
                            <i class="material-icons pull-left">star</i>
                            <i class="material-icons pull-left">star</i>
                            <i class="material-icons pull-left">star_half</i>
                            <i class="material-icons pull-left">star_border</i>
                        </h3>

                        <h3 class="title"> {{ with(new DateTime($trip->date))->format('d/m/Y') }}  ás {{ $trip->time }}</h3><br>
                        <i class="material-icons">room</i> <strong>De :</strong> {{ $trip->arrival_address }} <br/>
                        <i class="material-icons">radio_button_checked</i> <strong>Para :</strong> {{ $trip->exit_address }} <br>
                        <i class="material-icons">group</i> <strong> {{ $trip->Vehicle->num_passenger }} </strong> Lugares Disponíveis
                    </div>
                </div>
            </div>
        </a>
    </div>

    @endforeach
</div>


@endsection

@section('scripts')

@show





