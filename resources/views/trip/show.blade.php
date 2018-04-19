@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-7 col-md-7 col-sm-7">
            <div class="card card-stats">
                <div class="card-header" data-background-color="green">
                    <i class="fa fa-map-o"></i>
                </div>
                <div class="card-content">
                    <h3 class="title">Viagem</h3>
                    <p class="category"><i class="material-icons">airline_seat_recline_extra</i><strong>{{ $trip->num_passenger }}</strong> Lugares DisponÃ­veis</p>
                    <p class="card-content">
                        <i class="material-icons">room</i> <strong>De :</strong> {{ $trip->arrival_address }} <br/>
                        <i class="material-icons">radio_button_checked</i> <strong>Para :</strong> {{ $trip->exit_address }} <br>
                        <i class="material-icons">today</i> <strong>Data :</strong> {{ with(new DateTime($trip->date))->format('d/m/Y') }} <br>
                        <i class="material-icons" id="hour-time" data-hour_time="{{ \Carbon\Carbon::parse($trip->date.$trip->time)->subHours(1) }}">timer</i> <strong>Horário :</strong> {{ $trip->time }} <br>
                    </p>
                    <p class="category pull-right"> <i class="large material-icons">done</i> Sua vaga será reservada mediante aprovação  do motorista. <strong>Aguarde</strong>.</p><br>
                    Tempo restante para realizar a viagem: <strong class="right" id="demo"></strong>
                </div>

                <div class="card-footer">

                    @if($trip->canceled == true)
                        <p class="text-center text-danger"> VIAGEM CANCELADA </p>
                    @else

                        @if($trip->status == false)

                            @if($trip->EvaluationsFrom())
                                <p class="text-center text-success"> VIAGEM ENCERRADA E AVALIADA COM SUCESSO </p>
                            @else
                                <a href="#" class="btn btn-success btn-round pull-right" id="evaluation">Avaliar Motorista</a>
                            @endif
                        @else

                            @if($trip->searchMeeting())
                                @if($trip->searchMyMeeting()->accept)

                                    @if($trip->searchMyMeeting()->accept == true)
                                        <a href="{{ route('user.meeting.cancel', $trip) }}" class="btn btn-danger btn-round pull-right">{{ cancelarViagem }}</a>
                                    @else($trip->searchMyMeeting()->accept == false)
                                        <a href="#" class="btn btn-info btn-round pull-right">{{ viagemReprovada }}</a>
                                    @endif
                                @else
                                    <a href="#" class="btn btn-warning btn-round pull-right">{{ aguardadndoAprovacao }}</a>
                                @endif

                            @elseif($trip->dateExpired())
                                <a href="#" class="btn btn-danger btn-round pull-right">{{ btnViagemRealizada }}</a>
                            @else
                                <a href="{{ route('user.meeting.store', $trip) }}" class="btn btn-success btn-round pull-right" id="reservaTrip">{{ reservarViagem }}</a>
                            @endif

                        @endif
                    @endif

                </div>

            </div>
        </div>

        <div class="col-lg-5 col-md-5 col-sm-5">
            <div class="card card-profile">
                <div class="card-avatar">
                    <a href="#">
                        <img class="img" src="{{ asset($trip->User->Profile->photo_address) }}"/>
                    </a>
                </div>

                <div class="content">
                    <h4 class="card-title">{{ $trip->User->Profile->name }} {{ $trip->User->Profile->last_name }}</h4>
                    <h5 class="category text-gray">{{ $trip->User->Profile->age }} Anos</h5>
                    <h6 class="category text-gray">3 Avaliações - Nota 3,5</h6>
                    @if($trip->searchMeeting())
                        @if($trip->searchMyMeeting()->accept == true)
                            <p class="card-content">
                                {{ $trip->User->email }}<br>
                                {{ $trip->User->Profile->phone }} <br>
                                {{ $trip->User->Profile->about }}
                            </p>
                        @endif
                    @else
                        <p class="card-content">
                            <i class="large material-icons">done</i> <strong> Email Confirmado</strong><br>
                            <i class="large material-icons">done</i> <strong> Telefone Confirmado</strong>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>


    <div hidden  id="evaluation_driver">
        @include('evaluation.driver')
    </div>

@section('scripts')

    <script src="{{ asset('js/trip/time_trip.js') }}" type="application/javascript"></script>

    <script type="application/javascript">

        $('#reservaTrip').click(function(){

            if(verifyDate == false){
                event.preventDefault();
                $.notify({
                    title: 'Error',
                    message: "{{ tempoEdicao1 }}",
                },{
                    type: 'danger',
                });
            }
        });

        $("#evaluation").click(function(){

            $('#evaluation_driver').show();
        })

    </script>

@show


@endsection

