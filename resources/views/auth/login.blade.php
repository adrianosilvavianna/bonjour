@extends('layouts.app')

@section('content')

@desktop
<div class="container">
    <br><br>
    <div class="row">
        <div class="col-md-7 col-md-offset-3">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">Login</h4>
                    <p class="category">
                        <a href="?lang=login-pt-br" class="pull-right">
                            <img src="{{ asset('/img/lang/pt-br.png') }}" alt="Idioma Português">
                        </a>
                        <a href="?lang=en" class="pull-right">
                            <img src="{{ asset('/img/lang/en.png') }}" alt="Idioma Inglês">
                        </a>
                        <a href="?lang=fr" class="pull-right">
                            <img src="{{ asset('/img/lang/franca.png') }}" alt="Idioma Francês">
                        </a>
                    </p>
                </div>
                <div class="card-content">

                    <form class="" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating is-empty {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="control-label">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                    <span class="material-input"></span></div>


                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating is-empty {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label class="control-label">Password</label>
                                    <input type="password" class="form-control" name="email" value="{{ old('password') }}" required>
                                    <span class="material-input"></span></div>


                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ lembrarme }}
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <a class="" href="{{ route('password.request') }}">
                                        {{ btnEsqueciSenha }}
                                    </a>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">
                                    {{ btnLogin }}
                                </button>

                                <a class="btn btn-link" href="{{ route('register') }}">
                                    {{ btnCadastrarse }}
                                </a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@enddesktop

@mobile
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-mail</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Senha</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Lembrar-me
                                    </label>
                                    <br>
                                    <br>
                                    <a href="{{ route('password.request') }}">
                                        Esqueci minha senha
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                                <a class="btn btn-link" href="{{ route('register') }}">
                                    Cadastrar-se
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endmobile
@endsection
