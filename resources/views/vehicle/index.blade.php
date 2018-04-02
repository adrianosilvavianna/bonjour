@extends('layouts.app')

@section('content')

    @if($vehicles->count() == 0)
        <div class="alert alert-primary alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Você não possui veiculos cadastrado!</strong> Para dar caronas precisamos que cadastre seu veiculo.
        </div>
    @endif

    @foreach($vehicles as $vehicle)
        <div class="row">
            <div class="card">
                {{--<img class="card-img-top" src="https://easydrawingguides-7512.kxcdn.com/wp-content/uploads/2017/01/How-to-Draw-a-cartoon-car-20.png" alt="Card image cap">--}}
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $vehicle->brand }}</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{ modelo }} : {{ $vehicle->model }}</li>
                    <li class="list-group-item">{{ placa }} : {{ $vehicle->plaque }}</li>
                    <li class="list-group-item">{{ ano }} : {{ $vehicle->year }}</li>
                    <li class="list-group-item">{{ cor }} : {{ $vehicle->color }}</li>
                    <li class="list-group-item">{{ nPassageiros }} : {{ $vehicle->num_passenger }}</li>
                </ul>
                <div class="card-body">
                    <div class="row">
                        <a href="{{ route('user.vehicle.edit', $vehicle) }}" class="btn btn-info btn-block"><i class="fa fa-edit"></i> Editar</a>
                        <a href="{{ route('user.vehicle.delete', $vehicle) }}" class="btn btn-danger btn-block"><i class="fa fa-trash"></i> Excluir</a>
                    </div>
                </div>
            </div>
        </div>

    @endforeach

@endsection
