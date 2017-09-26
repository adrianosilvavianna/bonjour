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
                                <th><b>ID</b></th>
                                <th><b>MARCA</b></th>
                                <th><b>MODELO</b></th>
                                <th><b>PLACA</b></th>
                                <th><b>COR</b></th>
                                <th><b>Nº DE PASSAGEIROS</b></th>
                                <th><b>AÇÕES</b></th>
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
                                    <td>
                                        <a href="{{ route('user.vehicle.edit', $vehicle) }}">
                                            <i class="material-icons">border_color</i>
                                        </a>
                                        <a href="{{ route('user.vehicle.delete', $vehicle) }}">
                                            <i class="material-icons">delete</i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a href="{{ route('user.vehicle.create') }}">
                        <i class="material-icons">directions_car</i> Cadastrar um veículo...
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@show