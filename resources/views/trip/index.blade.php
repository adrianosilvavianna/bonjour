@extends('layouts.app')

@section('content')
<div class="container-fluid">
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
@endsection

@section('scripts')

@show