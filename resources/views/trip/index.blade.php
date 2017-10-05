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





