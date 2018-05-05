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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/mask/jquery.mask.js') }}"></script>
    <script src="{{ asset('js/mask/classes_mask.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function()
        {
            var name_marca= '';
            var name_modelo = '';
            $("#color").select2();

            //inicia select marca
            $('#marcas').select2({
                placeholder: 'Marcas', data: getMarcas()
            })
                .on("change", function(e) {
                    var id_marca    = ($(this).select2('val'));
                    $("#brand").val($('#marcas option:selected').text());
                    console.log(name_marca);

                    showModelos(id_marca);
                });

            //inicia select modelos
            $('#modelos').select2({ placeholder: 'Modelos' })
                .on("change", function(e) {
                    var id_modelo    = ($(this).select2('val'));
                    $("#model").val($('#modelos option:selected').text());

                    console.log(name_modelo);

                });

            //retorna todas as marcas
            function getMarcas(){

                var marcas   = {};
                $.ajax({
                    url: "https://fipeapi.appspot.com/api/1/carros/marcas.json",
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                        results = data.map(function(item) {
                            console.log(item.name);
                            return { id: item.id, text: item.name,  };
                        });
                        marcas = results;
                    }
                });
                console.log(marcas);
                return marcas
            }
            //retorna modelos referente a marca solicitada
            function getModelos(marca){

                var marca    = marca+'.json';
                var modelos  = {};

                $.ajax({
                    url: "https://fipeapi.appspot.com/api/1/carros/veiculos/"+marca,
                    async: false,
                    success: function(data) {

                        console.log(data);
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
