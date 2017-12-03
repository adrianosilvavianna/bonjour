<div class="row">
    <div class="col-md-7 col-md-7 col-sm-7">
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
                    <i class="material-icons">today</i> <strong>Data :</strong> {{ with(new DateTime($trip->date))->format('d/m/Y') }} <br>
                    <i class="material-icons" id="hour-time" data-hour_time="{{ \Carbon\Carbon::parse($trip->date.$trip->time)->subHours(1) }}">timer</i> <strong>Horário :</strong> {{ $trip->time }} <br>
                </p>
                <p class="category pull-right"> <i class="large material-icons">done</i> Sua reserva poderá ser aprovada pelo dono da viagem. <strong>Aguarde</strong>.</p><br>
                Tempo restante para realizar a viagem: <strong class="right" id="demo"></strong>
            </div>

            <div class="card-footer ">

                @if(auth()->user()->id == $trip->User->id)

                    <a href="{{ route('user.trip.canceled', $trip) }}" class="btn btn-danger btn-round pull-right">Cancelar Viagem</a>
                    <a href="{{ route('user.trip.edit', $trip) }}" class="btn btn-info btn-round pull-right" id="editTrip">Editar Viagem</a>
                @else

                    @if($trip->searchMeeting())
                        @if($trip->searchMyMeeting()->accept)

                            @if($trip->searchMyMeeting()->accept == true)
                                <a href="{{ route('user.meeting.cancel', $trip) }}" class="btn btn-danger btn-round pull-right">Cancelar Viagem</a>
                            @else($trip->searchMyMeeting()->accept == false)
                                <a href="#" class="btn btn-info btn-round pull-right">Viagem Reprovada</a>
                            @endif
                        @else
                            <a href="#" class="btn btn-warning btn-round pull-right">Aguardando Aprovação</a>
                        @endif

                    @else
                        <a href="{{ route('user.meeting.store', $trip) }}" class="btn btn-success btn-round pull-right" id="reservaTrip">Reservar Viagem</a>
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
                <a href="#pablo" class="btn btn-primary btn-round">Entrar em contato</a>
            </div>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script type="application/javascript">

    var verifyDate = true;

    console.log($("#hour-time").data('hour_time'));

    // Set the date we're counting down to
    var countDownDate = new Date($("#hour-time").data('hour_time'));

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
            verifyDate = false;
            clearInterval(x);
            document.getElementById("demo").innerHTML = "TEMPO EXPIRADO";
        }
    }, 1000)

    $('#editTrip').click(function(){
        if(verifyDate == false){
            event.preventDefault();
            $.notify({
                title: 'Error',
                message: "Tempo de edição esgotado. Para não finalizar a viagem, apenas mediante cancelamento",
            },{
                type: 'danger',
            });
        }
    });

    $('#reservaTrip').click(function(){
        alert(verifyDate);
        if(verifyDate == false){
            event.preventDefault();
            $.notify({
                title: 'Error',
                message: "Essa já foi ou está sendo realizada",
            },{
                type: 'danger',
            });
        }
    });

</script>

@show