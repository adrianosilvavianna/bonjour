@extends('layouts.app')

@section('content')

@desktop
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">
                        Meus Veiculos
                        <a href="{{ route('user.vehicle.create') }}" class=" btn-white btn-round btn-just-icon pull-right">
                            <i class="material-icons">add</i><div class="ripple-container"></div>
                        </a>
                    </h4>
                    <p class="category">Meus veiculos</p>
                </div>
                <div class="card-content">
                    <div class="card-content table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <th><b>MARCA</b></th>
                                <th><b>MODELO</b></th>
                                <th><b>PLACA</b></th>
                                <th><b>COR</b></th>
                                <th><b>ANO</b></th>
                                <th><b>Nº DE PASSAGEIROS</b></th>
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
                                        </button>
                                        <a href="{{ route('user.vehicle.delete', $vehicle) }}" rel="tooltip" title="Deletar carro" class="btn btn-danger btn-simple btn-xs">
<!--                                        <a href="{{ route('user.vehicle.delete', $vehicle) }}">-->
                                            <i class="material-icons">close</i>
<!--                                        </a>-->
                                        </button>
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
<div class="container-fluid">
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
                                <h3 class="card-title"> <b>{{ $vehicle->brand }} / {{ $vehicle->model }}</b></h3>
                                <h5 class="category text-gray"><b>Placa:</b> {{ $vehicle->plaque }}</h5>
                                <h6 class="category text-gray"><b>Cor:</b> {{ $vehicle->color }}</h6>
                                <h6 class="category text-gray"><b>Ano:</b> {{ $vehicle->year }}</h6>
                                <h6 class="category text-gray"><b>Nº passageiros:</b> {{ $vehicle->num_passenger }}</h6>
                                <p class="card-content"></p>
                                <a href="" class="btn btn-primary btn-round">Editar</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endmobile

@endsection

@section('scripts')

@show