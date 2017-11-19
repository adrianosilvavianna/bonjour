@extends('layouts.app')

@section('content')
    <div class="col-lg-6 col-md-12">
        <div class="card card-nav-tabs">
            <div class="card-header" data-background-color="purple">
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <span class="nav-tabs-title">Tasks:</span>
                        <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="active">
                                <a href="#profile" data-toggle="tab" aria-expanded="false">
                                    <i class="material-icons">bug_report</i> Idioma
                                    <div class="ripple-container"></div>
                                </a>
                            </li>
                            <li class="">
                                <a href="#messages" data-toggle="tab" aria-expanded="false">
                                    <i class="material-icons">code</i> Usuário
                                    <div class="ripple-container"></div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-content">
                    <div class="tab-content">
                        <div class="tab-pane active" id="profile">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="lang" @if(auth()->user()->Config->lang == "pt-br") checked @endif value="pt-br" class="lang">
                                            </label>
                                        </div>
                                    </td>
                                    <td>Protuguês</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="lang" value="en" class="lang" @if(auth()->user()->Config->lang == "en") checked @endif>
                                            </label>
                                        </div>
                                    </td>
                                    <td>Inglês</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="lang" value="fr" class="lang" @if(auth()->user()->Config->lang == "fr") checked @endif>
                                            </label>
                                        </div>
                                    </td>
                                    <td>Francês</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="messages">
                            <table class="table">
                                <tbody>
                                <tr>
                                   <td>
                                       <strong>Apelido</strong>
                                   </td>
                                    <td>
                                        {{ auth()->user()->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Email</strong>
                                    </td>
                                    <td>{{ auth()->user()->email }}</td>
                                </tr>
                                </tbody>
                            </table>
                            <a  class="btn btn-primary pull-right" id="btn-edit-user">Editar</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <div class="col-md-6" id="edit-user">
        <div class="card">
            <div class="card-header" data-background-color="purple">
                <h4 class="title">Editar Usuário</h4>
            </div>
            <div class="card-content">
                <form action="{{ route('user.update') }}" method="post">
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="col-md-12 {{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="form-group label-floating">
                                <label class="control-label">Apelido</label>
                                <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
                            </div>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong class="red-text">{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 {{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="form-group label-floating">
                                <label class="control-label">Email</label>
                                <input type="text" name="email" class="form-control" value="{{ auth()->user()->email }}">
                            </div>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong class="red-text">{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Atualizar Usuario<div class="ripple-container"></div></button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $( document ).ready(function() {
            $("#edit-user").hide();

            $("#btn-edit-user").click(function(){
                $("#edit-user").show();
            });

            $(".lang").change(function(){
                $.ajax({
                    type: 'POST',
                    url: '/user/config/update',
                    data: {lang: $(this).val()},

                    success: function(data) {
                        console.log(data);
                        $.notify({
                            title: 'Sucesso',
                            message: data.message+ "Idioma Alterado",
                        },{
                            type: 'success',
                        });
                        window.setTimeout(function(){
                            window.location.reload();
                        }, 2000);
                    },
                    error: function (error) {
                        console.log(error);
                        $.notify({
                            title: 'Error',
                            message: "Algo deu errado ao aceitar essa viagem, tente novamente. :/",
                        },{
                            type: 'danger',
                        });
                    }
                });
            })
        });
    </script>
@show