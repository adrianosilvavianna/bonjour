@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/percentage_star.css') }}" rel="stylesheet">
    <link href="{{ asset('css/time_line.css') }}" rel="stylesheet">
@show

@section('content')

    <div class="col-md-4">
        <div class="card card-profile">
            <div class="card-avatar">
                <img class="img" id="my_photo" src="{{ asset($user->Profile->photo_address) }}" title="Imagem de perfil">
            </div>
            <div class="content">
                <h3 class="card-title"> {{ $user->Profile->name }}</h3>
                <div class="star-ratings-sprite"><span style="width:{{ $user->Profile->percentage() }}%" class="star-ratings-sprite-rating"></span></div>
                <br><br>
                <a href="{{ route('user.profile.edit', $user->Profile) }}" class="btn btn-primary btn-round">{{ btnEditar }}</a>

            </div>
        </div>
    </div>

    <div class="col-md-8">
            <ul class="timeline">
                @foreach($user->Evaluations as $evaluation)
                    <li @if(($evaluation->id%2) == 0)class="timeline-inverted"@endif>
                        <div class="timeline-badge" style="background-color: {{randomHex()}}"></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title">Viagem Finalizada dia {{ with(new DateTime($evaluation->Meeting->Trip->date))->format('d/m/Y') }}</h4>
                                <p><small class="text-muted"><i class="fa fa-clock-o"></i> {{ with(new DateTime($evaluation->created_at))->format('d/m/Y - H:i') }}</small></p>
                            </div>
                            <div class="timeline-body">
                                <p>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: {{ percentage($evaluation->nota) }}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>


@endsection

