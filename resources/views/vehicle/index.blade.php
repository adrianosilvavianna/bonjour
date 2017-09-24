@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">Meus Veiculos</h4>
                    <p class="category">Cadastre seu veiculo</p>
                </div>
                <div class="card-content">
                    <div class="card-content table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <th>ID</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Placa</th>
                            <th>Cor</th>
                            <th>Nº de passageiros</th>
                            </thead>
                            <tbody>
                                @foreach($vehicles as $vehicle)
                                <tr>
                                    <td>{{ $vehicle->id }}</td>
                                    <td>{{ $vehicle->brand }}</td>
                                    <td>{{ $vehicle->model }}</td>
                                    <td>{{ $vehicle->plaque }}</td>
                                    <td>{{ $vehicle->color }}</td>
                                    <td>{{ $vehicle->num_passenger }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a href="{{ route('user.vehicle.create') }}">
                        <i class="material-icons">directions_car</i> Cadastrar um veículo
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@show