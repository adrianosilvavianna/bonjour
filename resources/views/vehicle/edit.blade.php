@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">Meu Veículo</h4>
                    <p class="category">Cadastre seu veiculo</p>
                </div>
                <div class="card-content">
                    <form action="{{ route('user.vehicle.update', $vehicle) }}" method="post">
                        {{ method_field('PUT') }}

                        <div class="col-md-12">
                            <div class="col-md-6 {{ $errors->has('brand') ? ' has-error' : '' }}">
                                <div class="form-group label-floating">
                                    <label for="exampleFormControlSelect1">Marcas</label>
                                    <select class="form-control form-control-lg" id="marcas" name="brand">
                                        <option>{{ $vehicle->brand }}</option>
                                    </select>
                                </div>

                                @if ($errors->has('brand'))
                                    <span class="help-block">
                                    <strong class="red-text">{{ $errors->first('brand') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-6 {{ $errors->has('model') ? ' has-error' : '' }}">

                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Modelos</label>
                                    <select class="form-control form-control-lg" id="modelos" name="model">
                                        <option>{{ $vehicle->model }}</option>
                                    </select>
                                </div>

                                @if ($errors->has('model'))
                                    <span class="help-block">
                                    <strong class="red-text">{{ $errors->first('model') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="cold-md-12">
                            <div class="col-md-3 {{ $errors->has('year') ? ' has-error' : '' }}">
                                <div class="form-group label-floating">
                                    <label class="control-label">Ano</label>
                                    <input type="number" name="year" class="form-control"  min="1980" max="{!! date('Y') !!}" value="{{ $vehicle->year }}">
                                </div>
                                @if ($errors->has('year'))
                                    <span class="help-block">
                                    <strong class="red-text">{{ $errors->first('year') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">Cor</label>
                                    <input type="text" name="color" class="form-control" value="{{ $vehicle->color }}">
                                </div>
                            </div>

                            <div class="col-md-3 {{ $errors->has('plaque') ? ' has-error' : '' }}">
                                <div class="form-group label-floating">
                                    <label class="control-label">Placa</label>
                                    <input type="text" name="plaque" class="form-control" value="{{ $vehicle->plaque }}">
                                </div>
                                @if ($errors->has('plaque'))
                                    <span class="help-block">
                                    <strong class="red-text">{{ $errors->first('plaque') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">Número de passageiros</label>
                                    <input type="number" name="num_passenger" class="form-control" value="{{ $vehicle->num_passenger }}" min="1" max="10" >
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