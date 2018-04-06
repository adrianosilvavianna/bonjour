<!DOCTYPE html>
<html lang="pt-br">

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

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
                            <h4>Cadastrar</h4>
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
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"  name="terms_use" value="1"> Confirmo os <a href="#" id="terms_use" >Termos de uso</a>
                                    </label>
                                </div>

                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
                                <div class="register-link m-t-15 text-center">
                                    <p>Já possui cadastro ? <a href="#"> Faça Login </a></p>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($errors->has('password') || $errors->has('terms_use') || $errors->has('email'))
        <span class="help-block">
             <script>
                 swal({
                     title: "Error !",
                     text: "{{ $errors->first('password') }}  {{ $errors->first('terms_use') }} {{ $errors->first('email') }}",
                     icon: "error",
                 });
             </script>
        </span>
    @endif

</div>

<script src="{{ asset('elaAdmin/js/lib/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('elaAdmin/js/lib/bootstrap/js/bootstrap.min.js') }}"></script>



<script src="{{ asset('elaAdmin/js/custom.min.js') }}"></script>

<script>
    $('#terms_use').click(function(){
        swal("Termos de uso!", "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?");
    });
</script>

</body>

</html>