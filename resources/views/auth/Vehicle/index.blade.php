@extends('layouts.app')

@section('content')
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
        <div class="card card-profile">
            <div class="card-avatar">
                <a href="#"  >
                    <img class="img" id="my_photo" src="{{ asset('assets/img/faces/marc.jpg') }}" title="alterar imagem">
                </a>
            </div>
            <div class="content">
                <h6 class="category text-gray">...</h6>
                <h4 class="card-title">{{ $profile->name }} {{ $profile->last_name }}</h4>
                <p class="card-content">
                    Idade : {{ $profile->age }} | Genero : {{ $profile->getGender() }}<br>

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
