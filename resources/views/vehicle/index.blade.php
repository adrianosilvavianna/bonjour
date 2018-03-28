@extends('layouts.app')

@section('content')

@desktop
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">
                        {{ meusVeiculos }}
                        <a href="{{ route('user.vehicle.create') }}" class=" btn-white btn-round btn-just-icon pull-right">
                            <i class="material-icons">add</i><div class="ripple-container"></div>
                        </a>
                    </h4>
                </div>
                <div class="card-content">
                    <div class="card-content table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <th><b>{{ marca }}</b></th>
                                <th><b>{{ modelo }}</b></th>
                                <th><b>{{ placa }}</b></th>
                                <th><b>{{ cor }}</b></th>
                                <th><b>{{ ano }}</b></th>
                                <th><b>{{ nPassageiros }}</b></th>
                                <th><b>#</b></th>
                            </thead>
                            <tbody>
                                @foreach($vehicles as $vehicle)
                                <tr>
                                    <td>{{ $vehicle->brand }}</td>
                                    <td>{{ $vehicle->model }}</td>
                                    <td>{{ $vehicle->plaque }}</td>
                                    <td>{{ $vehicle->color }}</td>
                                    <td>{{ $vehicle->year }}</td>
                                    <td>{{ $vehicle->num_passenger }}</td>
                                    <td>
                                        <a href="{{ route('user.vehicle.edit', $vehicle) }}" rel="tooltip" title="Editar carro" class="btn btn-primary btn-simple btn-xs">
<!--                                        <a href="{{ route('user.vehicle.edit', $vehicle) }}">-->
                                            <i class="material-icons">edit</i>
<!--                                        </a>-->
                                        </a>
                                        <a href="{{ route('user.vehicle.delete', $vehicle) }}" rel="tooltip" title="Deletar carro" class="btn btn-danger btn-simple btn-xs">
<!--                                        <a href="{{ route('user.vehicle.delete', $vehicle) }}">-->
                                            <i class="material-icons">close</i>
<!--                                        </a>-->
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@enddesktop

@mobile
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">
                        Veículos
                        <a href="{{ route('user.vehicle.create') }}" class=" btn-white btn-round btn-just-icon pull-right">
                            <i class="material-icons">add</i><div class="ripple-container"></div>
                        </a>
                    </h4>
                </div>
                @foreach($vehicles as $vehicle)
                    <div class="card-content">
                        <div class="card card-profile">
                            <div class="content">
                                <h3 class="card-title"> <b>{{ $vehicle->brand }}</b></h3>
                                <h4 class="card-title"> <b>{{ $vehicle->model }}</b></h4>
                                <h5 class="category text-gray"><b>Placa:</b> {{ $vehicle->plaque }}</h5>
                                <h6 class="category text-gray"><b>Cor:</b> {{ $vehicle->color }}</h6>
                                <h6 class="category text-gray"><b>Ano:</b> {{ $vehicle->year }}</h6>
                                <h6 class="category text-gray"><b>Nº passageiros:</b> {{ $vehicle->num_passenger }}</h6>
                                <p class="card-content"></p>
                                <a href="{{ route('user.vehicle.edit', $vehicle) }}" class="btn btn-primary ">Editar</a>
                                <a href="{{ route('user.vehicle.delete', $vehicle) }}" class="btn btn-danger ">Excluir</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endmobile

@endsection
