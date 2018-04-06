@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body p-b-0">
                    <h4 class="card-title">Configurações</h4>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs customtab" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#usuario" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Usuário</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#password_reset" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Alterar Senha</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#terms_use" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Termos de uso</span></a> </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active p-20" id="usuario" role="tabpanel">
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
                            <a href="#" class="btn btn-info btn-block" id="btn-edit-user">Editar</a>
                        </div>
                        <div class="tab-pane p-20" id="password_reset" role="tabpanel">
                            <form action="{{ route('user.reset_password') }}" method="post">
                                {{ method_field('PUT') }}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating is-empty {{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label class="control-label">Senha</label>
                                            <input type="password" class="form-control" name="password" value="{{ old('password') }}" required>
                                            <span class="material-input"></span></div>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating is-empty {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                            <label class="control-label">Confirmar senha</label>
                                            <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" required>
                                            <span class="material-input"></span></div>

                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Atualizar Password<div class="ripple-container"></div></button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                        <div class="tab-pane p-20" id="terms_use" role="tabpanel">
                            <p>
                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <div class="col-md-6" id="edit-user">
        <div class="card">
            <div class="card-title">
                <h4>Editar Usuário</h4>
            </div>
            <div class="card-body">
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

</div>
@endsection

@section('scripts')
    <script>
        $( document ).ready(function() {
            $("#edit-user").hide();

            $("#btn-edit-user").click(function(){
                $("#edit-user").show();
            });

        });
    </script>
@show