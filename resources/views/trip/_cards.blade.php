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

<div class="row">
    <div class="col-lg-12">
        <a href="{{ route('user.trip.show', $trip) }}">

            <div class="card card-stats">
                <div class="card-content">
                    <img class="pull-left" src="{{ asset($trip->User->Profile->photo_address) }}" style="border-radius: 50%" >
                    <h3 class="pull-left" style="margin-left: 5%">{{ $trip->User->Profile->name }} {{ $trip->User->Profile->last_name }} <br>
                        <i class="fa fa-star pull-left"></i>
                        <i class="fa fa-star pull-left"></i>
                        <i class="fa fa-star pull-left"></i>
                        <i class="fa fa-star pull-left"></i>
                        <i class="fa fa-star pull-left"></i>
                    </h3>

                    <h4 class="title text-right"> {{ with(new DateTime($trip->date))->format('d/m/Y') }}  às {{ $trip->time }} <br>
                        <i class="fa  fa-street-view"></i> <strong>{{ de }} :</strong> {{ $trip->arrival_address }} <br>
                        <i class="fa  fa-map-marker"></i> <strong>{{ para }} :</strong> {{ $trip->exit_address }} <br>
                        <i class="fa  fa-users"></i> <strong> {{ $trip->num_passenger }} </strong> {{ lugaresDisponiveis }}
                    </h4>

                </div>
            </div>

        </a>
    </div>
</div>

