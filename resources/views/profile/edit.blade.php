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

                        <div class="row">
                            <div class="col-md-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nome</label>
                                    <input type="text" name="name" class="form-control" value="{{ $profile->name  }}">
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
                                    <input type="text" name="last_name" class="form-control" value="{{ $profile->last_name }}">
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
                                    <input type="text" name="phone" class="form-control" value="{{ $profile->phone }}">
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
                                        <label class="control-label">Escreva um pouco sobre você...</label>
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
        $(document).ajaxStart($.blockUI).ajaxStop($.unblockUI).ready(function() {

            $("#get_code").change(function(){

                var zip_code = $(this).val();
                console.log(zip_code)

                $.getJSON("https://viacep.com.br/ws/"+zip_code+"/json/", function( json )
                {
                    console.log(json);
                })
                        .done(function(json)
                        {
                            $('#address').val(json.logradouro);
                            $('#district').val(json.bairro);
                            $('#city').val(json.localidade);
                            $('#uf').val(json.uf);
                            $('#ibge_number').val(json.ibge);
                            $('#complement').val(json.complemento);
                            btn.html(old);

                        })
                        .fail(function()
                        {
                            $('#address').val('');
                            $('#district').val('');
                            $('#city').val('');
                            $('#uf').val('');
                            $('#result').html('Cep não encontrado');
                            btn.html(':( Nova Consulta');
                        })

            });
        });
    </script>

    @show