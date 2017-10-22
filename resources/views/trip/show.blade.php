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
                    <p class="category"><i class="material-icons">airline_seat_recline_extra</i><strong>4</strong> Lugares Disponíveis</p>
                    <p class="card-content">
                        <i class="material-icons">room</i> <strong>De :</strong> Rua Solimoes, 849 - Curitiba <br/>
                        <i class="material-icons">radio_button_checked</i> <strong>Para :</strong> Rua Cidade De Tubarão, 849 - Curitiba <br>
                        <i class="material-icons">today</i> <strong>Data :</strong> 26/09/2017 <br>
                        <i class="material-icons">timer</i> <strong>Horário :</strong> 13:30 <br>
                    </p>
                    <p class="category pull-right"> <i class="large material-icons">done</i> A sua reserva será aprovada <strong>Automaticamente</strong></p><br>
                </div>

                <div class="card-footer ">

                    <a href="#pablo" class="btn btn-success btn-round pull-right">Reservar Viagem</a>
                </div>
            </div>
        </div>


        <div class="col-lg-5 col-md-5 col-sm-5">
            <div class="card card-profile">
                <div class="card-avatar">
                    <a href="#pablo">
                        <img class="img" src="{{ asset('assets/img/faces/marc.jpg') }}"/>
                    </a>
                </div>

                <div class="content">
                    <h4 class="card-title">Rogerio De Guimarães Reis</h4>
                    <h5 class="category text-gray">27 anos</h5>
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






