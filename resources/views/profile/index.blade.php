@extends('layouts.app')

@section('content')
    <div class="row">
        <!-- Column -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-two">
                        <header>
                            <div class="avatar">
                                <img src="{{ asset($profile->photo_address) }}" alt="{{ $profile->name }}" />
                            </div>
                        </header>

                        <h3>{{ $profile->name }} <a href="{{ route('user.profile.edit', $profile) }}" ><i class="fa fa-edit"></i></a></h3>
                        <div class="desc">
                            {{ $profile->about }}
                        </div>
                        <div class="contacts">
                            <a href="#" id="profile_information"><i class="fa fa-plus"></i></a>
                            <a href="#" id="profile_phone"><i class="fa fa-whatsapp"></i></a>
                            <a href="#" id="profile_email"><i class="fa fa-envelope"></i></a>

                            <div class="clear"></div>
                        </div>
                        <div class="card-body browser">

                            <p class="m-t-30 f-w-600"><a href="#" id="more_information">Dados de Perfil</a><span class="pull-right"><a href="#" id="more_information">{{ $profile->User->rakingProfile() }}%</a></span></p>
                            <div class="progress">
                                <div role="progressbar" style="width: {{ $profile->User->rakingProfile() }}%; height:8px;" class="progress-bar bg-success wow animated progress-animated"> <span class="sr-only">{{ $profile->User->rakingProfile() }}% Complete</span> </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-12">
            <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Linha do tempo</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Perfil</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Mais Informações</a> </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel">
                        <div class="card-body">
                            <div class="profiletimeline">
                                <div class="sl-item">
                                    <div class="sl-left"> <img src="{{ asset('img/layout/Appa2.png') }}" alt="user" class="img-circle" /> </div>
                                    <div class="sl-right">
                                        <div><a href="#" class="link">Michael Qin</a> <span class="sl-date">5 minutes ago</span>
                                            <p class="m-t-10"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum.
                                                Praesent mauris. Fusce nec tellus sed augue semper </p>
                                        </div>
                                        <div class="like-comm m-t-20"> <a href="javascript:void(0)" class="link m-r-10">2 comment</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="sl-item">
                                    <div class="sl-left"> <img src="{{ asset('img/layout/Appa2.png') }}" alt="user" class="img-circle" /> </div>
                                    <div class="sl-right">
                                        <div><a href="#" class="link">Michael Qin</a> <span class="sl-date">5 minutes ago</span>
                                            <blockquote class="m-t-10">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--second tab-->
                    <div class="tab-pane" id="profile" role="tabpanel">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Nome Completo</strong>
                                    <br>
                                    <p class="text-muted">{{ $profile->name }}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Phone</strong>
                                    <br>
                                    <p class="text-muted">{{ $profile->phone }}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                    <br>
                                    <p class="text-muted">{{ $profile->email }}</p>
                                </div>
                                <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                                    <br>
                                    <p class="text-muted">#</p>
                                </div>
                            </div>
                            <hr>
                            <p class="m-t-30">{{ $profile->about }}</p>
                            <h4 class="font-medium m-t-30">Avaliações</h4>
                            <hr>
                            <h5 class="m-t-30">HTML 5 <span class="pull-right">90%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                            </div>
                            <h5 class="m-t-30">jQuery <span class="pull-right">50%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                            </div>
                            <h5 class="m-t-30">Photoshop <span class="pull-right">70%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="settings" role="tabpanel">
                        <div class="card-body">
                            @if(isset($profile->MoreInformation))

                            @else
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Você precisa completar seu cadastro</h4>
                                        <div class="card-content">
                                            <a href="{{ route('user.more_information.create', $profile) }}" class="btn btn-info btn-flat btn-addon btn-lg m-b-10 m-l-5"><i class="ti-user"></i> Finalize seu cadastro</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>


@endsection

@section('scripts')
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script>
        $('#profile_information').click(function(){
            swal({
                title: "Mais informações sobre {{ $profile->name }}",
                text: "Idade : {{ $profile->age }} <br> Sexo: {{ getGender($profile->gender) }} <br> Sobre : {{ $profile->about }}",
                html: true
            });
        });

        $('#profile_phone').click(function(){
            swal({
                title: "+55 {{ $profile->phone }}",
                text: "Grave este numero em seu aparelho celular, caso seja necessário entrar em contato com {{ $profile->name }}",
            });
        });

        $('#profile_email').click(function(){
            swal({
                title: "Email de contato",
                text: "Email principal é : {{ $profile->User->email }} <br> Este usuário também pode ter estes emails: <br> {{ $profile->User->facebook }} <br> {{ $profile->User->github }}",
                html: true,
            });
        });

        $('#more_information').click(function(){
            swal({
                title: "Complete suas informações",
                text: "Continue completando seu cadastro, essas infomações são importantes para os outros usuários te conhecerem melhor",
            });
        });
    </script>

@show
