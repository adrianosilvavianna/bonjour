@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
    @show

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h4>Cadastre seu veiculo</h4>
                </div>
                <div class="card-body">
                    <div class="horizontal-form-elements">
                        <form action="{{ route('user.vehicle.store') }}" method="post" data-method="post" id="form-vehicle" class="form-horizontal">
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

    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/vehicle/vehicle.js') }}"></script>
    <script src="{{ asset('js/mask/jquery.mask.min.js') }}" type="text/javascript" ></script>
    <script src="{{ asset('js/classes_mask.js') }}"></script>

@show

