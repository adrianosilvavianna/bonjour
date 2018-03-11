@extends('layouts.app')

@section('css')
    <style>

    </style>
@show

@section('content')

    @include('trip._data_show')

<div class="row">

    @foreach($trip->Meetings as $meeting)
        <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="card card-profile">
                <div class="card-avatar">
                    <a href="#pablo">
                        <img class="img" src="{{ asset($meeting->User->Profile->photo_address) }}"/>
                    </a>
                </div>

                <div class="content">
                    <h4 class="card-title">{{ $meeting->User->Profile->name }} {{ $meeting->User->Profile->last_name }}</h4>
                    <h5 class="category text-gray">{{ $meeting->User->Profile->age }} Anos</h5>
                    <h6 class="category text-gray">3 Avaliações - Nota 3,5</h6>
                    <p class="card-content">
                        <strong> {{ $meeting->User->Profile->phone }}</strong><br>
                        <strong>{{ $meeting->User->email }}</strong><br>
                    </p>

                    <button  class="btn btn-primary btn-round " data-accept=1>Entrar em contato</button>

                    <div class="card-footer">
                        @if($meeting->accept == 2)
                            <div id="accept-{{ $meeting->id }}">
                                <button  class="btn btn-success btn-round accept"  data-meeting="{{ $meeting->id }}" data-user="{{ $meeting->User->id }}" data-accept=1>Aceitar</button>
                                <button  class="btn btn-danger btn-round accept"   data-meeting="{{ $meeting->id }}" data-user="{{ $meeting->User->id }} " data-accept=0>Recusar</button>
                            </div>
                        @elseif($meeting->accept == 1)
                                <h4 class="text-success">Aprovado</h4>
                        @elseif($meeting->accept == 0)
                                <h4 class="text-danger">Reprovado</h4>
                        @endif
                        <h4 id="acceptResult"></h4>
                    </div>

                </div>
            </div>
        </div>
    @endforeach

</div>

@endsection

@section('scripts')
    @parent
    <script type="application/javascript">

        $('.accept').click(function(){

            $.blockUI({ message: '<div id="preloader"><div id="loader"></div></div>' });

            var parm = {
                user_id: $(this).data('user'),
                meeting_id: $(this).data('meeting'),
                accept: $(this).data('accept')
            };

            $("#accept-"+$(this).data('meeting')).hide();

            $.ajax({
                type: 'POST',
                url: '/user/meeting/accept',
                data: parm,
                    success: function(data) {
                        $.unblockUI();
                        if(data.data.accept){
                            $('#acceptResult').html('Aprovado').addClass('text-success');
                        }else{
                            $('#acceptResult').html('Reprovado').addClass('text-danger');
                        }

                        $.notify({
                            title: 'Sucesso',
                            message: data.message,
                        },{
                            type: 'success',
                        });
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

    </script>

@show
