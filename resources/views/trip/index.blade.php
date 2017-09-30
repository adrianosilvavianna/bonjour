@extends('layouts.app')

@section('content')

    <style>
        .card img {
            width: 20%;
            height: auto;
            padding: 5%;
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
                    <img class="pull-left" src="../assets/img/faces/marc.jpg" style="border-radius: 50%" >
                    <h3 class="title">26/09/2017</h3>
                    <strong>De :</strong> Rua Solimoes, 849 - Curitiba <br/>
                    <strong>Para :</strong> Rua Cidade De Tubarão, 849 - Curitiba
                </div>
                <div class="card-footer">
                    <div class="stats">
                         Avaliação :
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@show

<!-- <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">Minha viagem</h4>
                    <p class="category">Visualize sua viagem</p>
                </div>
                <div class="card-content">
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <h4 class="card-title text-gray">Nome</h4>
                            <p class="card-content">
                                Matheus Afornali
                            </p>
                            <h4 class="card-title text-gray">Idade</h4>
                            <p class="card-content">
                                23 anos
                            </p>
                        </div>
                        <div class="col-md-4">
                            <h4 class="card-title text-gray">Origem</h4>
                            <p class="card-content">
                                Rua João Florindo Zanetti, nº 164 - Campo Largo
                            </p>
                            <h4 class="card-title text-gray">Destino</h4>
                            <p class="card-content">
                                Rua Jacarezinho, nº 1691 - Curitiba
                            </p>
                        </div>
                        <div class="col-md-4">
                            <h4 class="card-title text-gray">Data</h4>
                            <p class="card-content">
                                26/10/2017
                            </p>
                            <h4 class="card-title text-gray">Hora</h4>
                            <p class="card-content">
                                17:30:00
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

-->


