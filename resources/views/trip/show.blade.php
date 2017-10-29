@extends('layouts.app')

@section('css')
    <style>

    </style>
    @show

@section('content')

    <div class="row">
        <div class="col-md-7 col-md-7 col-sm-7">
            <div class="card card-stats">
                <div class="card-header" data-background-color="green">
                    <i class="fa fa-map-o"></i>
                </div>
                <div class="card-content">
                    <h3 class="title">Viagem</h3>
                    <p class="category"><i class="material-icons">airline_seat_recline_extra</i><strong>{{ $trip->num_passenger }}</strong> Lugares Disponíveis</p>
                    <p class="card-content">
                        <i class="material-icons">room</i> <strong>De :</strong> {{ $trip->arrival_address }} <br/>
                        <i class="material-icons">radio_button_checked</i> <strong>Para :</strong> {{ $trip->exit_address }} <br>
                        <i class="material-icons">today</i> <strong>Data :</strong> {{ with(new DateTime($trip->date))->format('d/m/Y') }} <br>
                        <i class="material-icons">timer</i> <strong>Horário :</strong> {{ $trip->time }} <br>
                    </p>
                    <p class="category pull-right"> <i class="large material-icons">done</i> A sua reserva será aprovada <strong>Automaticamente</strong></p><br>
                </div>

                <div class="card-footer ">

                    @if(auth()->user()->id == $trip->User->id)
                        <a href="{{ route('user.trip.edit', $trip) }}" class="btn btn-info btn-round pull-right">Editar Viagem</a>
                    @else
                        <a href="{{ route('user.meeting.store', $trip) }}" class="btn btn-success btn-round pull-right">Reservar Viagem</a>
                    @endif

                </div>

            </div>
        </div>


        <div class="col-lg-5 col-md-5 col-sm-5">
            <div class="card card-profile">
                <div class="card-avatar">
                    <a href="#pablo">
                        <img class="img" src="{{ asset($trip->User->Profile->photo_address) }}"/>
                    </a>
                </div>

                <div class="content">
                    <h4 class="card-title">{{ $trip->User->Profile->name }} {{ $trip->User->Profile->last_name }}</h4>
                    <h5 class="category text-gray">{{ $trip->User->Profile->age }} Anos</h5>
                    <h6 class="category text-gray">3 Avaliações - Nota 3,5</h6>
                    <p class="card-content">
                        <i class="large material-icons">done</i> <strong> Email Confirmado</strong><br>
                        <i class="large material-icons">done</i> <strong> Telefone Confirmado</strong>
                    </p>
                    <a href="#pablo" class="btn btn-primary btn-round">Entrar em contato</a>
                </div>
            </div>
        </div>
    </div>


@endsection






