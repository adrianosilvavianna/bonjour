<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/img/logo/logo.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('/img/logo/logo.png') }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Bonjou</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bonjour') }}</title>

    @section('css')

    @show

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="{{ asset('assets/css/material-dashboard.css') }}" rel="stylesheet"/>
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet" />

    <link href="{{ asset('css/loading.css') }}" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>


</head>
<body>

<div class="wrapper">

  @auth
      <div class="sidebar" data-color="purple" >
        <!--
            Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

            Tip 2: you can also add an image using data-image tag
        -->

        <div class="logo">
            <a href="{{ route('user.profile.index') }}" class="simple-text">
                {{ auth()->user()->name }}
            </a>
        </div>

        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="active">
                    <a href="{{ route('user.trip.index') }}">
                        <i class="material-icons">dashboard</i>
                        <p>{{ caronas }}</p>
                    </a>
                </li>
                <li>
                <li>
                    <a href="{{route('user.vehicle.index') }}">
                        <i class="material-icons">directions_car</i>
                        <p>{{ meusVeiculos }}</p>
                    </a>
                </li>

                <li>
                    <a href="{{ route('user.trip.create') }}">
                        <i class="material-icons">near_me</i>
                        <p>{{ oferecerCarona }}</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('user.trip.myTrips') }}">
                        <i class="material-icons">map</i>
                        <p>{{ minhasViagens }}</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('user.meeting.myRides') }}">
                        <i class="material-icons">room</i>
                        <p>{{ minhasCaronas }}</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('user.config.index') }}">
                        <i class="material-icons">settings</i>
                        <p>{{ configuracoes }}</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>


    <div class="main-panel">

        @desktop
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">BONJOU</a>
                </div>
                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            @if(auth()->user()->Config->lang == "pt-br")
                                <a href="?lang=pt-br"><img src="{{ asset('/img/lang/pt-br.png') }}" alt="Idioma Português"></a>
                            @elseif(auth()->user()->Config->lang == "en")
                                <a href="?lang=en"><img src="{{ asset('/img/lang/en.png') }}" alt="Idioma Inglês"></a>
                            @elseif(auth()->user()->Config->lang == "fr")
                                <a href="?lang=fr"><img src="{{ asset('/img/lang/franca.png') }}" alt="Idioma Francês"></a>
                            @endif
                        </li>

                        <li>
                            <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">dashboard</i>
                                <p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>

                        <li>
                            <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">person</i>
                                <a class="hidden-lg hidden-md">Perfil</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('user.profile.index') }}">Meu perfil</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @elsedesktop

        <nav class="navbar navbar-primary">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-icons">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Bonjou</a>
                </div>

                <div class="collapse navbar-collapse" id="example-navbar-icons">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{ route('user.profile.index') }}"><i class="material-icons">person</i> Meu Perfil </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="material-icons">input</i>
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        @enddesktop

    @endauth

        @desktop
        <div class="content">
        @enddesktop

            @if (session('error'))
                <div class="alert alert-danger">
                    <div class="container-fluid">
                        <div class="alert-icon">
                            <i class="material-icons">error_outline</i>
                        </div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="material-icons">clear</i></span>
                        </button>
                        <b>Error:</b> {!! session('error') !!}
                    </div>
                </div>
            @endif

            @if (session('success'))
                    <div class="alert alert-success">
                        <div class="container-fluid">
                            <div class="alert-icon">
                                <i class="material-icons">done</i>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                            </button>
                            <b>Sucesso:</b> {!! session('success') !!}
                        </div>
                    </div>
            @endif
            @if (session('info'))
                    <div class="alert alert-info">
                        <div class="container-fluid">
                            <div class="alert-icon">
                                <i class="material-icons">info_outline</i>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                            </button>
                            <b>Ops:</b> {!! session('info') !!}
                        </div>
                    </div>
            @endif

            @if (session('warning'))
                <div class="alert alert-warning">
                    <div class="container-fluid">
                        <div class="alert-icon">
                            <i class="material-icons">warning</i>
                        </div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="material-icons">clear</i></span>
                        </button>
                        <b>Alerta:</b> {!! session('warning') !!}
                    </div>
                </div>

            @endif

            @yield('content')


        @desktop
            </div>
        @enddesktop


        {{--<footer class="footer">--}}
            {{--<div class="container-fluid">--}}
                {{--<p class="copyright pull-right">--}}

                {{--</p>--}}
            {{--</div>--}}
        {{--</footer>--}}
    </div>
</div>

<!--   Core JS Files   -->
<script src="{{ asset('assets/js/jquery-3.1.0.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/blockui.js') }}" type="text/javascript" ></script>

<script src="{{ asset('assets/js/material.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets/js/material-dashboard.js') }}"></script>

{{--<script src="{{ asset('assets/js/material-kit.js') }}"></script>--}}
<!--  Notifications Plugin    -->
<script src="{{ asset('assets/js/bootstrap-notify.js') }}"></script>

<!--Restful-->
<script src="{{ asset('js/restful.js') }}" type="text/javascript" ></script>


<!-- Mascaras -->
<script src="{{ asset('js/mask/jquery.mask.min.js') }}" type="text/javascript" ></script>

<!-- Material Dashboard javascript methods -->


<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('assets/js/demo.js') }}"></script>

@section('scripts')

@show

</body>
</html>
