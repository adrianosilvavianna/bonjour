@extends('layouts.app')

@section('css')
    @parent
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
@show

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h4>Complete seu perfil</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('user.profile.store') }}" method="post"  enctype="multipart/form-data">

                            @include('information._inputs')

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
    @parent
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/mask/jquery.mask.min.js') }}" type="text/javascript" ></script>
    <script src="{{ asset('js/classes_mask.js') }}"></script>
@show