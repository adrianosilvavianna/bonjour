@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-7 col-md-7 col-sm-7">
            <div class="card ">

                <h3 class="title">Viagem</h3>

                <p class="category"><i class="fa  fa-users"></i><strong>{{ $trip->num_passenger }}</strong> Lugares
                    Disponíveis</p>

                <p class="card-content">
                    <i class="fa fa-street-view"></i> <strong>De :</strong> {{ $trip->arrival_address }} <br/>
                    <i class="fa fa-map-marker"></i> <strong>Para :</strong> {{ $trip->exit_address }} <br>
                    <i class="fa fa-calendar-check-o"></i> <strong>Data
                        :</strong> {{ with(new DateTime($trip->date))->format('d/m/Y') }} <br>
                    <i class="fa fa-clock-o" id="hour-time"
                       data-hour_time="{{ \Carbon\Carbon::parse($trip->date.$trip->time)->subHours(1) }}"></i> <strong>Horário
                        :</strong> {{ $trip->time }} <br>
                </p>

                <p class="category pull-right"><i class="large fa fa-check"></i> Sua reserva poderá ser aprovada pelo
                    dono da viagem. <strong>Aguarde</strong>.</p><br>
                Tempo restante para realizar a viagem: <strong class="right" id="demo"></strong>


                <div class="card-body">

                    @if($trip->canceled == true)
                        <p class="text-center text-danger"> VIAGEM CANCELADA </p>
                    @else

                        @if($trip->status == false)
                            <a href="{{ route('user.evaluation.passenger', $trip) }}"
                               class="btn btn-success btn-rounded pull-right" id="avaliationPassenger">Avaliar
                                Passageiros</a>
                        @else
                            <a href="{{ route('user.trip.canceled', $trip) }}"
                               class="btn btn-danger btn-rounded pull-right">{{ btnCancelar }}</a>
                            <a href="{{ route('user.trip.edit', $trip) }}" class="btn btn-info btn-rounded pull-right"
                               id="editTrip">{{ btnEditar }}</a>
                            <a href="{{ route('user.trip.finish', $trip) }}"
                               class="btn btn-success btn-rounded pull-right" id="finishTrip">{{ btnFinalizar }}</a>
                        @endif

                    @endif
                </div>

            </div>
        </div>

        <div class="col-lg-5">
            @include('trip._profile_driver', $trip)
        </div>
    </div>

    @include('passenger._passenger')

@section('scripts')

    <script src="{{ asset('js/trip/time_trip.js') }}" type="application/javascript"></script>

    <script type="application/javascript">

        $('#finishTrip').hide();

        $('#editTrip').click(function () {
            if (verifyDate == false) {
                event.preventDefault();
                $.notify({
                    title: 'Error',
                    message: "{{ tempoEdicao }}",
                }, {
                    type: 'danger',
                });
            }
        });

        $('#reservaTrip').click(function () {

            if (verifyDate == false) {
                event.preventDefault();
                $.notify({
                    title: 'Error',
                    message: "{{ tempoEdicao1 }}",
                }, {
                    type: 'danger',
                });
            }
        });

    </script>

@show

@endsection
