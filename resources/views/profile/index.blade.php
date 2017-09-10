@extends('layouts.app')

@section('content')
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
        <div class="card card-profile">
            <div class="card-avatar">
                <a href="#pablo"  >
                    <img class="img" id="my_photo" src="{{ asset('assets/img/faces/marc.jpg') }}" title="alterar imagem">
                </a>
            </div>

            <div class="content">
                <p class="card-content">
                    País : Afeganistão | Idade : 21  | Genero : Masculino<br>
                    Telefone : (41) 9999-9090 | Telefone : (41) 90909-2131
                </p>
                <a href="{{ route('user.profile.edit', $profile) }}" class="btn btn-primary btn-round">Editar</a>


            </div>
        </div>
    </div>
    <div class="col-md-3">
    </div>
@endsection

@section('scripts')

@show
