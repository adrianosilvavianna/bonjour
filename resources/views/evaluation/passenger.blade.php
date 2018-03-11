@extends('layouts.app')

{{--@section('css')--}}
    {{--<link href="{{ asset('css/evaluation/star_rating.css') }}" rel="stylesheet">--}}
{{--@show--}}

@section('content')

    <div class="row">
        @foreach($trip->Meetings as $meeting)
            <div class="col-lg-5 col-md-5 col-sm-5">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a href="">
                            <img class="img" src="{{ asset($meeting->User->Profile->photo_address) }}"/>
                        </a>
                    </div>

                    <div class="content">
                        <h4 class="card-title">{{ $meeting->User->Profile->name }} {{ $meeting->User->Profile->last_name }}</h4>
                        <h6 class="category text-gray"> {{ $meeting->User->Profile->about }}</h6>
                        <h6 class="category text-gray">{{ $meeting->User->Profile->age }} Anos </h6>
                        <h6 class="category text-gray">Nota no racking {{ $meeting->User->ratingEvaluation() }} </h6>
                        <p class="card-content">
                            <strong> {{ $meeting->User->Profile->phone }}</strong><br>
                            <strong>{{ $meeting->User->email }}</strong><br>
                        </p>
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

                        <div class="card-footer" >
                            <h4 class="text-primary">Avaliação</h4>
                                <form action="{{ route('user.evaluation.storePassenger', [$meeting->Trip->id, $meeting->User->id]) }}" class="from_star">
                                @include('evaluation._inputs_star_rating')
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        @endforeach

    </div>



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


@endsection

