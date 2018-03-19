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
                    <form action="{{ route('user.vehicle.store') }}" method="post" id="form-vehicle" >
                        <div class="col-md-12">
                            <div class="col-md-4 {{ $errors->has('brand') ? ' has-error' : '' }}">
                                <div class="form-group label-floating">
                                    <label for="exampleFormControlSelect1">Marcas</label>
                                    <select class="form-control form-control-lg" id="marcas" name="brand">
                                        <option>Selecione</option>
                                    </select>
                                </div>

                                @if ($errors->has('brand'))
                                <span class="help-block">
                                    <strong class="red-text">{{ $errors->first('brand') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-4 {{ $errors->has('model') ? ' has-error' : '' }}">

                                <div class="form-group  label-floating">
                                    <label for="exampleFormControlSelect2">Modelos</label>
                                    <select class="form-control form-control-lg" id="modelos" name="model">
                                        <option>...</option>
                                    </select>
                                </div>

                                @if ($errors->has('model'))
                                <span class="help-block">
                                    <strong class="red-text">{{ $errors->first('model') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="">Cor</label>
                                    <select class="form-control form-control-lg" id="color" name="color">
                                        <option>Prata</option>
                                        <option>Preto</option>
                                        <option>Branco</option>
                                        <option>Cinza</option>
                                        <option>Cinza claro</option>
                                        <option>Cinza escuro</option>
                                        <option>Marrom</option>
                                        <option>Vermelho</option>
                                        <option>Vermelho claro</option>
                                        <option>Vermelho escuro</option>
                                        <option>Azul</option>
                                        <option>Azul claro</option>
                                        <option>Azul escuro</option>
                                        <option>Bege</option>
                                        <option>Verde</option>
                                        <option>Verde claro</option>
                                        <option>Verde escuro</option>
                                        <option>Amarelo</option>
                                        <option>Amarelo claro</option>
                                        <option>Amarelo escuro</option>
                                        <option>Grafite</option>
                                        <option>Dourado</option>
                                        <option>Laranja</option>
                                        <option>Rosa</option>
                                        <option>Bordo</option>
                                        <option>Violeta</option>
                                        <option>Lilas</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="cold-md-12">
                            <div class="col-md-3 {{ $errors->has('year') ? ' has-error' : '' }}">
                                <div class="form-group label-floating">
                                    <label class="control-label">Ano</label>
                                    <input type="number" name="year" id="year" class="form-control" value="2016" min="1980" max="{!! date('Y') !!}">
                                </div>
                                @if ($errors->has('year'))
                                <span class="help-block">
                                    <strong class="red-text">{{ $errors->first('year') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="col-md-3 {{ $errors->has('plaque') ? ' has-error' : '' }}">
                                <div class="form-group label-floating">
                                    <label class="control-label">Placa</label>
                                    <input type="text" name="plaque" id="plaque" class="form-control" value="{{ old('plaque') }}">
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
                                    <input type="number" name="num_passenger" id="num_passenger" class="form-control" value="3" min="1" max="10">
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
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/vehicle/vehicle.js') }}"></script>

@show
