@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h4>Edite seu perfil</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                    <form action="{{ route('user.profile.update', $profile) }}" method="post" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                            @include('profile._inputs')

                            <div class="col-md-2">
                                <img class="img" id="my_photo" src="{{ asset($profile->photo_address) }}" title="Imagem de perfil">
                                <a href="{{ route('user.profile.rotateLeft', $profile) }}" data-method="post" title="Girar para esquerda"><i class="fa fa-rotate-left"></i></a>
                                <a href="{{ route('user.profile.rotateRight', $profile) }}" data-method="post" title="Girar para direita"><i class="fa fa-rotate-right"></i></a>
                            </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary pull-right">Atualizar perfil</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    @show