@extends('layouts.app')

@section('content')
<div class="container">

    <br><br>

    <div class="row">
        <div class="col-md-7 col-md-offset-3">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">Cadastrar</h4>
                    <p class="category">
                        <a href="?lang=login-pt-br" class="pull-right">
                            <img src="{{ asset('/img/lang/pt-br.png') }}" alt="Idioma Português">
                        </a>
                        <a href="?lang=en" class="pull-right">
                            <img src="{{ asset('lang_e') }}" alt="Idioma Inglês">
                        </a>
                        <a href="?lang=fr" class="pull-right">
                            <img src="{{ asset('/img/lang/franca.png') }}" alt="Idioma Francês">
                        </a>
                    </p>
                </div>
                <div class="card-content">

                    <form class="" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating is-empty {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label class="control-label">Apelido</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                    <span class="material-input"></span></div>


                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating is-empty {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="control-label">{{ email }}</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
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
                                    {{ btnCadastrarse }}
                                </button>

                                <a class="btn btn-link" href="{{ route('login') }}">
                                    {{ btnLogin }}
                                </a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
