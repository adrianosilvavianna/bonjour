@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/percentage_star.css') }}" rel="stylesheet">
@show

@section('content')
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
        <div class="card card-profile">
            <div class="card-avatar">
                <img class="img" id="my_photo" src="{{ asset($profile->photo_address) }}" title="Imagem de perfil">
            </div>
            <div class="content">
                <h3 class="card-title"> {{ $profile->name }} {{ $profile->last_name }}</h3>
                <div class="star-ratings-sprite"><span style="width:{{ $profile->percentage() }}%" class="star-ratings-sprite-rating"></span></div>
                <h5 class="category text-gray">{{ $profile->age }} {{ anos }} | {{ sexo }} : {{ $profile->getGender() }}</h5>
                <h6 class="category text-gray">{{ telefone }} : {{ $profile->phone }}</h6>
                <p class="card-content">
                    {{ $profile->about }}
                </p>

                <a href="{{ route('user.profile.edit', $profile) }}" class="btn btn-primary btn-round">{{ btnEditar }}</a>

            </div>
        </div>
    </div>
    <div class="col-md-3">
    </div>
@endsection

@section('scripts')

@show
