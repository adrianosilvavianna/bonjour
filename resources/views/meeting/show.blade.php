@extends('layouts.app')

@section('css')
    <style>

    </style>
@show

@section('content')

    <div class="row">
        <div class="col-md-12 col-md-12 col-sm-12">
            <div class="card card-stats">
                <div class="card-header" data-background-color="green">
                    <i class="fa fa-map-o"></i>
                </div>
                <div class="card-content">
                    <h3 class="title">Viagem</h3>
                    <p class="category"><i class="material-icons">airline_seat_recline_extra</i><strong>{{ $trip->num_passenger }}</strong> Lugares Disponíveis</p>
                    <p class="card-content">
                        <i class="material-icons">room</i> <strong>De :</strong> {{ $trip->arrival_address }} <br/>
                        <i class="material-icons">radio_button_checked</i> <strong>Para :</strong> {{ $trip->exit_address }} <br>
                        <i class="material-icons">today</i> <strong id="hour" data-hour="{{ $trip->date }}">Data :</strong> {{ with(new DateTime($trip->date))->format('d/m/Y') }} <br>
                        <i class="material-icons">timer</i> <strong id="time" data-time="{{ $trip->time }}">Horário :</strong> {{ $trip->time }} <br>
                    </p>
                </div>

                <div class="card-footer ">

                    @if(auth()->user()->id == $trip->User->id)
                        Tempo restante para edição: <strong class="right" id="demo"></strong>
                        <a href="{{ route('user.trip.edit', $trip) }}" class="btn btn-info btn-round pull-right">Editar Viagem</a>
                    @else

                        @if($trip->searchMeeting())
                            <a href="{{ route('user.meeting.cancel', $trip) }}" class="btn btn-danger btn-round pull-right">Cancelar Viagem</a>
                        @else
                            <a href="{{ route('user.meeting.store', $trip) }}" class="btn btn-success btn-round pull-right">Reservar Viagem</a>
                        @endif

                    @endif



                </div>

            </div>
        </div>
    </div>

<div class="row">

    @foreach($trip->Meetings as $meeting)
        <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="card card-profile">
                <div class="card-avatar">
                    <a href="#pablo">
                        <img class="img" src="{{ asset($meeting->User->Profile->photo_address) }}"/>
                    </a>
                </div>

                <div class="content">
                    <h4 class="card-title">{{ $meeting->User->Profile->name }} {{ $meeting->User->Profile->last_name }}</h4>
                    <h5 class="category text-gray">{{ $meeting->User->Profile->age }} Anos</h5>
                    <h6 class="category text-gray">3 Avaliações - Nota 3,5</h6>
                    <p class="card-content">
                        <strong> {{ $meeting->User->Profile->phone }}</strong><br>
                        <strong>{{ $meeting->User->email }}</strong><br>
                    </p>

                    @if(is_null($meeting->accept))
                        <button  class="btn btn-success btn-round accept" data-meeting="{{ $meeting->id }}" data-user="{{ $meeting->User->id }}" data-accept=1>Aceitar</button>
                        <button  class="btn btn-danger btn-round accept"data-meeting="{{ $meeting->id }}" data-user="{{ $meeting->User->id }} " data-accept=0>Recusar</button>
                    @else
                        @if($meeting->accept)
                            <p id="acceptResult">Aprovado</p>
                        @else
                            <p>Reprovado</p>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    @endforeach

</div>


@endsection

@section('scripts')
    @parent
    <script type="application/javascript">
        $('.accept').click(function(){

            var parm = {
                user_id: $(this).data('user'),
                meeting_id: $(this).data('meeting'),
                accept: $(this).data('accept')
            };

            $.ajax({
                type: 'POST',
                url: '/user/meeting/accept',
                data: parm,
                    success: function(data) {
                        $('.accept').hide();
                        if(data.data.accept){
                            $('#acceptResult').html("Aceito");
                        }else{
                            $('#acceptResult').html("Reprevado")
                        }

                        $.notify({
                            title: 'Sucesso',
                            message: data.message,
                        },{
                            type: 'success',
                        });
                },
                error: function (error) {
                    console.log(error);
                    $.notify({
                        title: 'Error',
                        message: "Algo deu errado ao aceitar essa viagem, tente novamente. :/",
                    },{
                        type: 'danger',
                    });
                }
            });

        });

        // Set the date we're counting down to
        var countDownDate = new Date($("#hour").data('hour')+" "+$("#time").data('time')).getTime();

        console.log();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get todays date and time
            var now = new Date().getTime();

            // Find the distance between now an the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("demo").innerHTML = days + "d " + hours + "h "
                    + minutes + "m " + seconds + "s ";

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>

@show






