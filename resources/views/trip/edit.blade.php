@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Editar Viagem</h4>
                        <p class="category">Edite os dados</p>
                    </div>
                    <div class="card-content">

                        <form action="{{ route('user.trip.update', $trip) }}" method="post">
                            {{ method_field('PUT') }}

                            @include('trip._inputs')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

