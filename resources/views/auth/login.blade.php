@extends('layouts.app')

@section('content')


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
                                    <input type="password" class="form-control" name="password" value="{{ old('password') }}" required>
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
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ btnLogin }}
                            </button>
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
                            <div class="col-md-12" >


                                <a class="btn btn-link" href="{{ route('register') }}">
                                    {{ btnCadastrarse }}
                                </a>

                                <a class="btn pull-right" href="/entrar/facebook" style="background-color: #3b5998">
                                    Entre com Facebook <i class="fa fa-facebook"></i>
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

