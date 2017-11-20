
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
                            <span class="nav-tabs-title">Tasks:</span>
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="active">
                                    <a href="#accept" data-toggle="tab">
                                        <i class="material-icons">bug_report</i>
                                        Aceitas
                                        <div class="ripple-container"></div></a>
                                </li>
                                <li class="">
                                    <a href="#pending" data-toggle="tab">
                                        <i class="material-icons">code</i>
                                        Pendentes
                                        <div class="ripple-container"></div></a>
                                </li>
                                <li class="">
                                    <a href="#canceled" data-toggle="tab">
                                        <i class="material-icons">cloud</i>
                                        Canceladas
                                        <div class="ripple-container"></div></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card-content">
                    <div class="tab-content">
                        <div class="tab-pane active" id="accept">
                            @foreach($meetingApproved as $meeting)

                                <div class="row">
                                    <a href="{{ route('user.meeting.show', $meeting) }}">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="card card-stats">
                                                <div class="card-content">
                                                    <img class="pull-left" src="{{ asset($meeting->User->Profile->photo_address) }}" style="border-radius: 50%" >
                                                    <h3 class="pull-left" style="margin-left: 5%">{{ $meeting->User->Profile->name }} {{ $meeting->User->Profile->last_name }} <br>
                                                        <i class="material-icons pull-left">star</i>
                                                        <i class="material-icons pull-left">star</i>
                                                        <i class="material-icons pull-left">star</i>
                                                        <i class="material-icons pull-left">star_half</i>
                                                        <i class="material-icons pull-left">star_border</i>
                                                    </h3>

                                                    <h3 class="title"> {{ with(new DateTime($meeting->Trip->date))->format('d/m/Y') }}  às {{ $meeting->Trip->time }}</h3><br>
                                                    <i class="material-icons">room</i> <strong>De :</strong> {{ $meeting->Trip->arrival_address }} <br/>
                                                    <i class="material-icons">radio_button_checked</i> <strong>Para :</strong> {{ $meeting->Trip->exit_address }} <br>
                                                    <i class="material-icons">group</i> <strong> {{ $meeting->Trip->num_passenger }} </strong> Lugares Disponíveis
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            @endforeach
                        </div>
                        <div class="tab-pane" id="pending">
                            <div class="container-fluid">

                                @foreach($meetingReproved as $meeting)

                                    <div class="row">
                                        <a href="{{ route('user.meeting.show', $meeting) }}">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="card card-stats">
                                                    <div class="card-content">
                                                        <img class="pull-left" src="{{ asset($meeting->User->Profile->photo_address) }}" style="border-radius: 50%" >
                                                        <h3 class="pull-left" style="margin-left: 5%">{{ $meeting->User->Profile->name }} {{ $meeting->User->Profile->last_name }} <br>
                                                            <i class="material-icons pull-left">star</i>
                                                            <i class="material-icons pull-left">star</i>
                                                            <i class="material-icons pull-left">star</i>
                                                            <i class="material-icons pull-left">star_half</i>
                                                            <i class="material-icons pull-left">star_border</i>
                                                        </h3>

                                                        <h3 class="title"> {{ with(new DateTime($meeting->Trip->date))->format('d/m/Y') }}  às {{ $meeting->Trip->time }}</h3><br>
                                                        <i class="material-icons">room</i> <strong>De :</strong> {{ $meeting->Trip->arrival_address }} <br/>
                                                        <i class="material-icons">radio_button_checked</i> <strong>Para :</strong> {{ $meeting->Trip->exit_address }} <br>
                                                        <i class="material-icons">group</i> <strong> {{ $meeting->Trip->num_passenger }} </strong> Lugares Disponíveis
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

                                @foreach($meetingPending as $meeting)

                                    <div class="row">
                                        <a href="{{ route('user.meeting.show', $meeting) }}">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="card card-stats">
                                                    <div class="card-content">
                                                        <img class="pull-left" src="{{ asset($meeting->User->Profile->photo_address) }}" style="border-radius: 50%" >
                                                        <h3 class="pull-left" style="margin-left: 5%">{{ $meeting->User->Profile->name }} {{ $meeting->User->Profile->last_name }} <br>
                                                            <i class="material-icons pull-left">star</i>
                                                            <i class="material-icons pull-left">star</i>
                                                            <i class="material-icons pull-left">star</i>
                                                            <i class="material-icons pull-left">star_half</i>
                                                            <i class="material-icons pull-left">star_border</i>
                                                        </h3>

                                                        <h3 class="title"> {{ with(new DateTime($meeting->Trip->date))->format('d/m/Y') }}  às {{ $meeting->Trip->time }}</h3><br>
                                                        <i class="material-icons">room</i> <strong>De :</strong> {{ $meeting->Trip->arrival_address }} <br/>
                                                        <i class="material-icons">radio_button_checked</i> <strong>Para :</strong> {{ $meeting->Trip->exit_address }} <br>
                                                        <i class="material-icons">group</i> <strong> {{ $meeting->Trip->num_passenger }} </strong> Lugares Disponíveis
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





