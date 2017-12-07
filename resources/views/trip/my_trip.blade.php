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

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card card-nav-tabs">
                <div class="card-header" data-background-color="purple">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">

                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="active">
                                    <a href="#finished" data-toggle="tab">
                                        <i class="material-icons">check_box</i>
                                        {{ finalizadas }}
                                        <div class="ripple-container"></div></a>
                                </li>
                                <li class="">
                                    <a href="#pending" data-toggle="tab">
                                        <i class="material-icons">error_outline</i>
                                        
                                        {{ pendentes }}
                                        <div class="ripple-container"></div></a>
                                </li>
                                <li class="">
                                    <a href="#canceled" data-toggle="tab">
                                        <i class="material-icons">cancel</i>
                                        {{ canceladas }}
                                        <div class="ripple-container"></div></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card-content">
                    <div class="tab-content">
                        <div class="tab-pane active" id="finished">
                            @foreach($tripsFinished as $trip)

                                <div class="row">
                                    <a href="{{ route('user.meeting.show', $trip) }}">
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

                                                    <h3 class="title"> {{ with(new DateTime($trip->date))->format('d/m/Y') }}  às {{ $trip->time }}</h3><br>
                                                    <i class="material-icons">room</i> <strong>De :</strong> {{ $trip->arrival_address }} <br/>
                                                    <i class="material-icons">radio_button_checked</i> <strong>Para :</strong> {{ $trip->exit_address }} <br>
                                                    <i class="material-icons">group</i> <strong> {{ $trip->num_passenger }} </strong> Lugares Disponíveis
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            @endforeach
                        </div>
                        <div class="tab-pane" id="pending">
                            <div class="container-fluid">

                                @foreach($tripsPending as $trip)

                                    <div class="row">
                                        <a href="{{ route('user.meeting.show', $trip) }}">
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

                                                        <h3 class="title"> {{ with(new DateTime($trip->date))->format('d/m/Y') }}  às {{ $trip->time }}</h3><br>
                                                        <i class="material-icons">room</i> <strong>De :</strong> {{ $trip->arrival_address }} <br/>
                                                        <i class="material-icons">radio_button_checked</i> <strong>Para :</strong> {{ $trip->exit_address }} <br>
                                                        <i class="material-icons">group</i> <strong> {{ $trip->num_passenger }} </strong> Lugares Disponíveis
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane" id="canceled">

                            <div class="container-fluid">

                                @foreach($tripsCanceled as $trip)

                                    <div class="row">
                                        <a href="{{ route('user.meeting.show', $trip) }}">
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

                                                        <h3 class="title"> {{ with(new DateTime($trip->date))->format('d/m/Y') }}  às {{ $trip->time }}</h3><br>
                                                        <i class="material-icons">room</i> <strong>De :</strong> {{ $trip->arrival_address }} <br/>
                                                        <i class="material-icons">radio_button_checked</i> <strong>Para :</strong> {{ $trip->exit_address }} <br>
                                                        <i class="material-icons">group</i> <strong> {{ $trip->num_passenger }} </strong> Lugares Disponíveis
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection





