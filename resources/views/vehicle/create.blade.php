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
                    <form action="{{ route('user.vehicle.store') }}" method="post" >
                        <div class="col-md-12">
                            <div class="col-md-6 {{ $errors->has('brand') ? ' has-error' : '' }}">
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
                            <div class="col-md-6 {{ $errors->has('model') ? ' has-error' : '' }}">

                                <div class="form-group">
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
                        </div>


                        <div class="cold-md-12">
                            <div class="col-md-3 {{ $errors->has('year') ? ' has-error' : '' }}">
                                <div class="form-group label-floating">
                                    <label class="control-label">Ano</label>
                                    <input type="number" name="year" class="form-control" value="2016" min="1980" max="{!! date('Y') !!}">
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
                                    <input type="text" name="color" class="form-control" value="{{ old('color') }}">
                                </div>
                            </div>

                            <div class="col-md-3 {{ $errors->has('plaque') ? ' has-error' : '' }}">
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
                            <div class="col-md-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">Número de passageiros</label>
                                    <input type="number" name="num_passenger" class="form-control" value="3" min="1" max="10">
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

    <script type="text/javascript">

        $(document).ready(function()
        {
            //inicia select marca
            $('#marcas').select2({
                placeholder: 'Marcas', data: getMarcas()
            })
                    .on("change", function(e) {
                        var id_marca    = ($(this).select2('val'));
                        showModelos(id_marca);
                    });

            //inicia select modelos
            $('#modelos').select2({ placeholder: 'Modelos' });

            //retorna todas as marcas
            function getMarcas(){

                var marcas   = {};
                $.ajax({
                    url: "http://fipeapi.appspot.com/api/1/carros/marcas.json",
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                        results = data.map(function(item) {
                            return { id: item.id, text: item.name };
                        });
                        marcas = results;
                    }
                });
                return marcas
            }
            //retorna modelos referente a marca solicitada
            function getModelos(marca){

                var marca    = marca+'.json';
                var modelos  = {};

                $.ajax({
                    url: "http://fipeapi.appspot.com/api/1/carros/veiculos/"+marca,
                    async: false,
                    success: function(data) {

                        results = data.map(function(item) {
                            return { id: item.id, text: item.name, };
                        });
                        modelos = results;

                    }
                });
                return modelos;
            }

            //exibi na tela os modelos
            function showModelos(marca) {

                $("#modelos").empty();
                $('#modelos').select2({ data: getModelos(marca) });
            }
        });
    </script>
@show