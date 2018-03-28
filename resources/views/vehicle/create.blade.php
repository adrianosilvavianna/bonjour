@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
    @show

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">Meu Veículo</h4>
                    <p class="category">Cadastre um veiculo</p>
                </div>
                <div class="card-content">
                    <form action="{{ route('user.vehicle.store') }}" method="post" data-method="post" id="form-vehicle" >
                        @include('vehicle._inputs')
                        <button type="submit" class="btn btn-primary pull-right">Salvar veículo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/vehicle/vehicle_local.js') }}"></script>

@show
