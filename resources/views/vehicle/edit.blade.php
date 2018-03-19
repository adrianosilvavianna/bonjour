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
                        <p class="category">Atualize seu veículo</p>
                    </div>
                    <div class="card-content">
                        <form action="{{ route('user.vehicle.update', $vehicle) }}" method="post" data-method="put" id="form-vehicle" data-vehicle="{{ $vehicle->id }}" >
                            {{ method_field('PUT') }}
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

    <script type="text/javascript">

//        $(document).ready(function()
//        {
//
//            $( "#form-vehicle" ).submit(function(){
//                event.preventDefault();
//                $.blockUI({ message: '<div id="preloader"><div id="loader"></div></div>' });
//
//                var parm = {
//                    brand: name_marca,
//                    model: name_modelo,
//                    color: $("#color").val(),
//                    plaque: $("#plaque").val(),
//                    year: $("#year").val(),
//                    num_passenger: $("#num_passenger").val()
//                };
//                console.log(parm);
//
//                $.ajax({
//                    type: 'PUT',
//                    url: '/user/vehicle/'+$(this).data('vehicle')+'/update',
//                    data: parm,
//                    success: function(data) {
//                        $("#form-vehicle input").val("");
//                        $.unblockUI();
//                        $.notify({
//                            title: 'Sucesso',
//                            message: data.message,
//                        },{
//                            type: 'success',
//                        });
//                        window.setTimeout(function(){
//                            window.location = "/user/vehicle";
//                        }, 1500);
//                    },
//                    error: function (error) {
//                        console.log(error);
//                        $.unblockUI();
//                        $.notify({
//                            title: 'Error',
//                            message: error.message,
//                        },{
//                            type: 'danger',
//                        });
//                    }
//                });
//
//            });
//
//        });
    </script>
@show
