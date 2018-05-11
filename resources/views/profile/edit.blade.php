@extends('layouts.app')

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">Editar perfil</h4>
                    <p class="category">Edite o seu perfil...</p>
                </div>
                <div class="card-content">
                    <form action="{{ route('user.profile.update', $profile) }}" method="post" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        <div class="row">
                            <div class="col-md-12 {{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="form-group label-floating">
                                    <label class="control-label">{{ nome }}</label>
                                    <input type="text" name="name" class="form-control" value="{{ $profile->name  }}">
                                </div>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                    <strong class="red-text">{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 {{ $errors->has('age') ? ' has-error' : '' }}">
                                <div class="form-group label-floating">
                                    <label class="control-label">{{ idade }}</label>
                                    <input type="number" name="age" class="form-control" value="{{ $profile->age }}">
                                </div>
                                @if ($errors->has('age'))
                                    <span class="help-block">
                                    <strong class="red-text">{{ $errors->first('age') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">{{ genero }}</label>
                                    <select type="text" name="gender" class="form-control">
                                        <option value="0">{{ $profile->getGender() }}</option>
                                        @if($profile->gender == 0)
                                            <option value="1">{{ masculino }}</option>
                                        @else
                                            <option value="0">{{ feminino }}</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 {{ $errors->has('phone') ? ' has-error' : '' }}">
                                <div class="form-group label-floating">
                                    <label class="control-label">{{ telefone }}</label>
                                    <input type="text" name="phone" class="form-control phone_with_ddd" value="{{ $profile->phone }}">
                                </div>
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                    <strong class="red-text">{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group label-floating">
                                        <label class="control-label">{{ sobreVoce }}</label>
                                        <textarea class="form-control" name="about">{{ $profile->about }}</textarea>
                                    </div>
                                </div>
                                @if ($errors->has('about'))
                                    <span class="help-block">
                                    <strong class="red-text">{{ $errors->first('about') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label>Foto</label>
                                <div class="file-field input-field">
                                    <input type="file" class="btn btn-default" name="photo_address">
                                </div>
                                @if ($errors->has('photo_address'))
                                    <span class="help-block">
                                        <strong class="red-text">{{ $errors->first('photo_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-2">
                                <img class="img" id="my_photo" src="{{ asset($profile->photo_address) }}" title="Imagem de perfil">
                                <a href="{{ route('user.profile.rotateLeft', $profile) }}" data-method="post"><i class="material-icons">rotate_left</i></a>
                                <a href="{{ route('user.profile.rotateRight', $profile) }}" data-method="post"><i class="material-icons">rotate_right</i></a>
                            </div>
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
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            $('.phone_with_ddd').mask('(00) 00000-0000');
        });
    </script>

    @show