<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="O projeto Bonjou, que significa Bom Dia em dialeto creóle, pretende ajudar na questão da forte evasão escolar, por falta de meios de transporte, além de promover a aproximação entre Brasileiros e Haitianos.">
    <meta name="author" content="https://github.com/adrianosilvavianna">

    <link rel="icon" type="image/png" sizes="16x16" href="#">
    <title>Bonjou</title>

    <link href="{{ asset('elaAdmin/css/lib/bootstrap/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('elaAdmin/css/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('elaAdmin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('elaAdmin/css/socialite.css') }}" rel="stylesheet">

    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>

    </style>

</head>

<body class="fix-header fix-sidebar">
<!-- Preloader - style you can find in spinners.css -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
</div>
<!-- Main wrapper  -->
<div id="main-wrapper">

    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="login-content card">
                        <div class="login-form">
                            <h4>Login</h4>
                            <form  method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating is-empty {{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label class="control-label">Email</label>
                                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                            <span class="material-input"></span></div>

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
                                        @if ($errors->has('email'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('email') }}</strong>
                                                <script>
                                                    swal({
                                                        title: "Error !",
                                                        text: "{{ $errors->first('email') }}",
                                                        icon: "error",
                                                    });
                                                </script>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ lembrarme }}
                                    </label>
                                    <label class="pull-right">
                                        <a class="" href="{{ route('password.request') }}">
                                            {{ btnEsqueciSenha }}
                                        </a>
                                    </label>

                                </div>
                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Entrar</button>

                            </form>

                            <div class="register-link  text-center">
                                <p>
                                    Não possui uma conda ?
                                    <a href="{{ route('register') }}">
                                        {{ btnCadastrarse }}
                                    </a>
                                </p>
                            </div>

                            <div>
                                <ul class="social-icons ">
                                    <li class="icon icon--facebook">
                                        <a href="/entrar/facebook">
                                            <span class="icon__name">Facebook</span>
                                        </a>
                                    </li>
                                    <li class="icon icon--twitter">
                                        <a href="#">
                                            <span class="icon__name">Twitter</span>
                                        </a>
                                    </li>
                                    <li class="icon icon--instagram">
                                        <a href="#">
                                            <span class="icon__name">Instagram</span>
                                        </a>
                                    </li>
                                    <li class="icon icon--github">
                                        <a href="#">
                                            <span class="icon__name">GitHub</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="{{ asset('elaAdmin/js/lib/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('elaAdmin/js/lib/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('elaAdmin/js/lib/bootstrap/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('elaAdmin/js/jquery.slimscroll.js') }}"></script>

<script src="{{ asset('elaAdmin/js/sidebarmenu.js') }}"></script>

<script src="{{ asset('elaAdmin/js/lib/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>

<script src="{{ asset('elaAdmin/js/custom.min.js') }}"></script>


</body>

</html>