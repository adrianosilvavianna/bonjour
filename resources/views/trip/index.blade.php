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
        <a href="{{ route('user.trip.show') }}">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card card-stats">
                    <div class="card-content">
                        <img class="pull-left" src="{{ asset('assets/img/faces/marc.jpg') }}" style="border-radius: 50%" >
                        <h3 class="pull-left" style="margin-left: 5%">Rogerio De Guimarães Reis <br>
                            <i class="material-icons pull-left">star</i>
                            <i class="material-icons pull-left">star</i>
                            <i class="material-icons pull-left">star</i>
                            <i class="material-icons pull-left">star_half</i>
                            <i class="material-icons pull-left">star_border</i>
                        </h3>

                        <h3 class="title">26/09/2017 ás 13:30</h3><br>
                        <i class="material-icons">room</i> <strong>De :</strong> Rua Solimoes, 849 - Curitiba <br/>
                        <i class="material-icons">radio_button_checked</i> <strong>Para :</strong> Rua Cidade De Tubarão, 849 - Curitiba <br>
                        <i class="material-icons">group</i> <strong>4</strong> Lugares Disponíveis
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>


@endsection

@section('scripts')

@show





