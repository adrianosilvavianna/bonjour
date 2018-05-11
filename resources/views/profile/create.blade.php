@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">Meu perfil</h4>
                    <p class="category">Cadastre seu perfil</p>
                </div>
                <div class="card-content">
                    <form action="{{ route('user.profile.store') }}" method="post"  enctype="multipart/form-data">

                        @include('profile._inputs')

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary pull-right">{{ btnSalvarPerfil }}</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            $('.phone_with_ddd').mask('(00) 00000-0000');
            $('.age').mask('00');
        });
    </script>
@show