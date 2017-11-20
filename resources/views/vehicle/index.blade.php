@extends('layouts.app')

@section('content')

@desktop
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">
                        {{ meusVeiculos }}
                        <a href="{{ route('user.vehicle.create') }}" class=" btn-white btn-round btn-just-icon pull-right">
                            <i class="material-icons">add</i><div class="ripple-container"></div>
                        </a>
                    </h4>
                </div>
                <div class="card-content">
                    <div class="card-content table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <th><b>{{ marca }}</b></th>
                                <th><b>{{ modelo }}</b></th>
                                <th><b>{{ placa }}</b></th>
                                <th><b>{{ cor }}</b></th>
                                <th><b>{{ ano }}</b></th>
                                <th><b>{{ nPassageiros }}</b></th>
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
@endmobile

@endsection

@section('scripts')
    <script src="{{ asset('js/select2.min.js') }}"></script>

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
                        name_marca  = ($('#marcas option:selected').text());
                        console.log(name_marca);

                        showModelos(id_marca);
                    });

            //inicia select modelos
            $('#modelos').select2({ placeholder: 'Modelos' })
                    .on("change", function(e) {
                        var id_modelo    = ($(this).select2('val'));
                        name_modelo    = ($('#modelos option:selected').text());

                        console.log(name_modelo);

                    });

            //retorna todas as marcas
            function getMarcas(){

                var marcas   = {};
                $.ajax({
                    url: "http://fipeapi.appspot.com/api/1/carros/marcas.json",
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
                    url: "http://fipeapi.appspot.com/api/1/carros/veiculos/"+marca,
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

            $( "#form-vehicle" ).submit(function(){
                event.preventDefault();
                $.blockUI({ message: '<div class="boxLoading"></div>' });

                var parm = {
                    brand: name_marca,
                    model: name_modelo,
                    color: $("#color").val(),
                    plaque: $("#plaque").val(),
                    year: $("#year").val(),
                    num_passenger: $("#num_passenger").val()
                };
                console.log(parm);

                $.ajax({
                    type: 'POST',
                    url: '/user/vehicle/update',
                    data: parm,
                    success: function(data) {
                        $("#form-vehicle input").val("");
                        $.unblockUI();
                        $.notify({
                            title: 'Sucesso',
                            message: data.message+ " Obrigado!",
                        },{
                            type: 'success',
                        });
                        window.setTimeout(function(){
                            window.location = "/user/vehicle";
                        }, 1000);
                    },
                    error: function (error) {
                        console.log(error);
                        $.unblockUI();
                        $.notify({
                            title: 'Error',
                            message: "Algo deu errado ao aceitar essa viagem, tente novamente. :/",
                        },{
                            type: 'danger',
                        });
                    }
                });

            });

        });
    </script>
@show