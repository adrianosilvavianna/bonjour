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

    <link href="{{ asset('elaAdmin/css/lib/sweetalert/sweetalert.css') }}" rel="stylesheet">
    <script src="{{ asset('elaAdmin/js/lib/sweetalert/sweetalert.min.js') }}"></script>

    <link href="{{ asset('elaAdmin/css/lib/bootstrap/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('elaAdmin/css/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('elaAdmin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/avatar.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    {{--<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>--}}

</head>

<body class="fix-header fix-sidebar">
<!-- Preloader - style you can find in spinners.css -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
</div>
<!-- Main wrapper  -->
<div id="main-wrapper">
    <!-- header header  -->
    <div class="header">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <!-- Logo -->
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">
                    <!-- Logo icon -->
                    <b><img src="{{ asset('img/layout/logo.png') }}" alt="homepage" class="dark-logo" /></b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span><img src="{{ asset('img/layout/logo_bonjou.png') }}" alt="homepage" class="dark-logo" /></span>

                </a>
                </a>

            </div>
            <!-- End Logo -->
            <div class="navbar-collapse">
                <!-- toggle and nav items -->
                <ul class="navbar-nav mr-auto mt-md-0">
                    <!-- This is  -->
                    <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                    <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    <li class="nav-item dropdown">
                        @if(auth()->user()->Config)
                            @if(auth()->user()->Config->lang == "pt-br")
                                <a class="nav-link dropdown-toggle text-muted" href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flag-icon flag-icon-br"></i></a>
                            @elseif(auth()->user()->Config->lang == "en")
                                <a class="nav-link dropdown-toggle text-muted" href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flag-icon flag-icon-us"></i></a>
                            @elseif(auth()->user()->Config->lang == "fr")
                                <a class="nav-link dropdown-toggle text-muted" href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flag-icon flag-icon-fr"></i></a>
                            @endif
                        @else
                            <a class="nav-link dropdown-toggle text-muted" href="?lang=pt-br" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flag-icon flag-icon-br"></i></a>
                        @endif

                        <div class="dropdown-menu animated zoomIn">
                            <a class="dropdown-item" href="{{ route('user.config.update') }}?lang=pt-br" data-method="post"><i class="flag-icon flag-icon-br"></i> Portugês</a>
                            <a class="dropdown-item" href="{{ route('user.config.update') }}?lang=en" data-method="post"><i class="flag-icon flag-icon-us"></i> Inglês</a>
                            <a class="dropdown-item" href="{{ route('user.config.update') }}?lang=fr" data-method="post"><i class="flag-icon flag-icon-fr"></i> Francês</a>
                        </div>
                    </li>
                </ul>
                <!-- User profile and search -->
                <ul class="navbar-nav my-lg-0">

                    <!-- Search -->
                    <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-search"></i></a>
                        <form class="app-search">
                            <input type="text" class="form-control" placeholder="Search here"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                    </li>
                    <!-- Comment -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell"></i>
                            <div class="notify"> <!--<span class="heartbit"></span>--> <span class="point"></span> </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                            <ul>
                                <li>
                                    <div class="drop-title">Notifications</div>
                                </li>
                                <li>
                                    <div class="message-center">
                                        <!-- Message -->
                                        <a href="#">
                                            <div class="btn btn-danger btn-circle m-r-10"><i class="fa fa-link"></i></div>
                                            <div class="mail-contnet">
                                                <h5>This is title</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- End Comment -->
                    <!-- Messages -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted  " href="#" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-envelope"></i>
                            <div class="notify"> <!--<span class="heartbit"></span>--> <span class="point"></span> </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn" aria-labelledby="2">
                            <ul>
                                <li>
                                    <div class="drop-title">You have 4 new messages</div>
                                </li>
                                <li>
                                    <div class="message-center">
                                        <!-- Message -->
                                        <a href="#">
                                            <div class="user-img"> <img src="{{ asset('img/layout/Appa2.png') }}" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Michael Qin</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span>
                                            </div>
                                        </a>

                                    </div>
                                </li>
                                <li>
                                    <a class="nav-link text-center" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- End Messages -->
                    <!-- Profile -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="round profile-pic"  avatar="{{ auth()->user()->name }}"></a>
                        <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                            <ul class="dropdown-user">
                                <li><a href="{{ route('user.profile.index') }}"><i class="ti-user"></i> Perfil</a></li>
                                <li><a href="#"><i class="ti-star"></i> Avaliações</a></li>
                                <li><a href="{{ route('user.config.index') }}"><i class="ti-settings"></i> Configurações</a></li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa fa-power-off"></i>
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- End header header -->
    <!-- Left Sidebar  -->
    <div class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="nav-devider"></li>
                    <li class="nav-label">Home</li>
                    <li>
                        <a href="{{ route('user.trip.index') }}"><i class="fa fa-tachometer"></i>{{ caronas }}</a>
                    </li>
                    <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-car"></i><span class="hide-menu">{{ meusVeiculos }}</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{ route('user.vehicle.index') }}">Listar veiculos</a></li>
                            <li><a href="{{ route('user.vehicle.create') }}">Cadastrar Veiculos</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-map-signs"></i><span class="hide-menu">Caronas</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{ route('user.trip.create') }}">{{ oferecerCarona }}</a></li>
                            <li><a href="{{route('user.trip.myTrips') }}">Caronas Que Ofereci</a></li>
                            <li><a href="{{route('user.meeting.myRides') }}">Caronas Que Peguei</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </div>
    <!-- End Left Sidebar  -->
    <!-- Page wrapper  -->
    <div class="page-wrapper">
        <!-- Bread crumb
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-primary">Dashboard</h3> </div>
            <div class="col-md-7 align-self-center">
                <?php $id = 1 ?>
                <ol class="breadcrumb">
                    @while(\Request::segment($id))
                        <li class="breadcrumb-item">{{ \Request::segment($id) }}</li>
                        <?php $id++ ?>
                    @endwhile
                </ol>
            </div>
        </div>
        -->
        <div class="container-fluid">

            @if (session('error'))
                <script>
                    swal({
                        title: "Error",
                        text: "{{session('error')}}",
                        icon: "error",
                        button: "Ok",
                    });
                </script>
            @endif

            @if (session('success'))
                <script>
                    swal({
                        title: "Muito Bom!",
                        text: "{{session('success')}}",
                        icon: "success",
                        button: "Ok",
                    });
                </script>
            @endif
            @if (session('info'))
                <script>
                    swal({
                        title: "Ops",
                        text: "{{session('info')}}",
                        icon: "info",
                        button: "Ok",
                    });
                </script>
            @endif

            @if (session('warning'))
                <script>
                    swal({
                        title: "Algo está errado",
                        text: "{{session('warning')}}",
                        icon: "warning",
                        button: "Ok",
                    });
                </script>
            @endif

            @yield('content')
        </div>

    </div>
    <!-- End Page wrapper  -->
</div>
<!-- End Wrapper -->
<!-- All Jquery -->
<script src="{{ asset('elaAdmin/js/lib/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('elaAdmin/js/lib/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('elaAdmin/js/lib/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset('elaAdmin/js/jquery.slimscroll.js') }}"></script>
<!--Menu sidebar -->
<script src="{{ asset('elaAdmin/js/sidebarmenu.js') }}"></script>
<!--stickey kit -->
<script src="{{ asset('elaAdmin/js/lib/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>

<script src="{{ asset('js/restful.js') }}" type="text/javascript" ></script>

<script src="{{ asset('js/avatar.js') }}" type="text/javascript" ></script>

<!--Custom JavaScript -->
<script src="{{ asset('elaAdmin/js/custom.min.js') }}"></script>

@section('scripts')

@show


</body>

</html>