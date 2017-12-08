<style>
    .card img {
        width: 10%;
        height: auto;
        margin-bottom: 1%;
    }
    p{
        height: auto;
    }
</style>


<div class="container-fluid">

    @foreach($trips as $trip)

        <div class="row">
            <a href="{{ route('user.trip.show', $trip) }}">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card card-stats">
                        <div class="card-content">
                            <img class="pull-left" src="{{ asset($trip->User->Profile->photo_address) }}" style="border-radius: 50%" >
                            <h3 class="pull-left" style="margin-left: 5%">{{ $trip->User->Profile->name }} {{ $trip->User->Profile->last_name }} <br>
                                <i class="material-icons pull-left">star</i>
                                <i class="material-icons pull-left">star</i>
                                <i class="material-icons pull-left">star</i>
                                <i class="material-icons pull-left">star_half</i>
                                <i class="material-icons pull-left">star_border</i>
                            </h3>

                            <h3 class="title"> {{ with(new DateTime($trip->date))->format('d/m/Y') }}  às {{ $trip->time }}</h3><br>
                            <i class="material-icons">room</i> <strong>{{ de }} :</strong> {{ $trip->arrival_address }} <br/>
                            <i class="material-icons">radio_button_checked</i> <strong>{{ para }} :</strong> {{ $trip->exit_address }} <br>
                            <i class="material-icons">group</i> <strong> {{ $trip->num_passenger }} </strong> {{ lugaresDisponiveis }}
                        </div>
                    </div>
                </div>
            </a>
        </div>

    @endforeach
</div>