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


                        <div class="row">
                            <div class="col-md-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nome</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                </div>
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong class="red-text">{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-6 {{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <div class="form-group label-floating">
                                    <label class="control-label">Sobrenome</label>
                                    <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}">
                                </div>
                                @if ($errors->has('last_name'))
                                <span class="help-block">
                                    <strong class="red-text">{{ $errors->first('last_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 {{ $errors->has('age') ? ' has-error' : '' }}">
                                <div class="form-group label-floating">
                                    <label class="control-label">Idade</label>
                                    <input type="number" name="age" class="form-control age" value="{{ old('age') }}">
                                </div>
                                @if ($errors->has('age'))
                                <span class="help-block">
                                    <strong class="red-text">{{ $errors->first('age') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Gênero</label>
                                    <select type="text" name="gender" class="form-control">
                                        <option value="0">Feminino</option>
                                        <option value="1">Masculino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 {{ $errors->has('phone') ? ' has-error' : '' }}">
                                <div class="form-group label-floating">
                                    <label class="control-label">Telefone</label>
                                    <input type="text" name="phone" class="form-control phone_with_ddd" value="{{ old('phone') }}">
                                </div>
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                    <strong class="red-text ">{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Escreva um pouco sobre você...</label>
                                        <textarea class="form-control" name="about">{{ old('about') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 {{ $errors->has('photo_address') ? ' has-error' : '' }}">
                                <label>Foto</label>
                                <div class="file-field input-field">
                                    <input type="file" class="btn btn-default" name="photo_address">
                                </div>
                                @if ($errors->has('photo_address'))
                                    <span class="help-block">
                                    <strong class="red-text ">{{ $errors->first('photo_address') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">

                            <button type="submit" class="btn btn-primary pull-right">Salvar perfil</button>
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