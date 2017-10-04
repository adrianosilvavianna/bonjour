@extends('layouts.app')

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
                    <form action="{{ route('user.vehicle.store') }}" method="post" >
                        <div class="col-md-12">
                            <div class="col-md-6 {{ $errors->has('brand') ? ' has-error' : '' }}">
                                <div class="form-group label-floating">
                                    <label class="control-label">Marca</label>
                                    <input type="text" name="brand" class="form-control" value="{{ old('brand') }}">
                                </div>
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong class="red-text">{{ $errors->first('brand') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-6 {{ $errors->has('model') ? ' has-error' : '' }}">
                                <div class="form-group label-floating">
                                    <label class="control-label">Modelo</label>
                                    <input type="text" name="model" class="form-control" value="{{ old('model') }}">
                                </div>
                                @if ($errors->has('model'))
                                <span class="help-block">
                                    <strong class="red-text">{{ $errors->first('model') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="cold-md-12">
                            <div class="col-md-6 {{ $errors->has('year') ? ' has-error' : '' }}">
                                <div class="form-group label-floating">
                                    <label class="control-label">Ano</label>
                                    <input type="numeric" name="year" class="form-control" value="{{ old('year') }}">
                                </div>
                                @if ($errors->has('year'))
                                <span class="help-block">
                                    <strong class="red-text">{{ $errors->first('year') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Cor</label>
                                    <input type="text" name="color" class="form-control" value="{{ old('color') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-6 {{ $errors->has('plaque') ? ' has-error' : '' }}">
                                <div class="form-group label-floating">
                                    <label class="control-label">Placa</label>
                                    <input type="text" name="plaque" class="form-control" value="{{ old('plaque') }}">
                                </div>
                                @if ($errors->has('plaque'))
                                <span class="help-block">
                                    <strong class="red-text">{{ $errors->first('plaque') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Número de passageiros</label>
                                    <input type="text" name="num_passenger" class="form-control" value="{{ old('num_passenger') }}">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">Salvar veículo</button>
                    </form>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@show