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
                    <form action="{{ route('user.profile.store') }}" method="post" >


                        <div class="row ">
                            <div class="col-md-3 {{ $errors->has('profile[name]') ? ' has-error' : '' }}">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nome</label>
                                    <input type="text" name="profile[name]" class="form-control" value="{{ old('profile[name]') }}">
                                </div>
                                @if ($errors->has('profile[name]'))
                                    <span class="help-block">
                                        <strong class="red-text">{{ $errors->first('profile[name]') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3 {{ $errors->has('profile[last_name]') ? ' has-error' : '' }}">
                                <div class="form-group label-floating">
                                    <label class="control-label">Sobrenome</label>
                                    <input type="text" name="profile[last_name]" class="form-control" value="{{ old('profile[name]') }}">
                                </div>
                                @if ($errors->has('profile[last_name]'))
                                    <span class="help-block">
                                        <strong class="red-text">{{ $errors->first('profile[last_name]') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3 {{ $errors->has('profile[last_name]') ? ' has-error' : '' }}">
                                <div class="form-group label-floating">
                                    <label class="control-label">Idade</label>
                                    <input type="numeric" name="profile[age]" class="form-control" value="{{ old('profile[age]') }}">
                                </div>
                                @if ($errors->has('profile[age]'))
                                    <span class="help-block">
                                        <strong class="red-text">{{ $errors->first('profile[age]') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">Gênero</label>
                                    <select type="text" name="profile[gender]" class="form-control">
                                        <option value="0">Feminino</option>
                                        <option value="1">Masculino</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 {{ $errors->has('location[zip_code]') ? ' has-error' : '' }}">
                                <div class="form-group label-floating ">
                                    <label class="control-label">CEP</label>
                                    <input type="text" name="location[zip_code]" id="zip_code" class="form-control" value="{{ old('location[zip_code]') }}">
                                </div>
                                @if ($errors->has('location[zip_code]'))
                                    <span class="help-block">
                                        <strong class="red-text">{{ $errors->first('location[zip_code]') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-7">
                                <div class="form-group label-floating focus">
                                    <label class="control-label">Endereço</label>
                                    <input type="text" name="location[address]" class="form-control" id="address">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group label-floating">
                                    <label class="control-label">Número</label>
                                    <input type="text" name="location[number]" class="form-control" id="address">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group label-floating focus">
                                    <label class="control-label">Bairro</label>
                                    <input type="text" class="form-control" name="location[district]" id="district">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group label-floating focus">
                                    <label class="control-label">Cidade</label>
                                    <input type="text" class="form-control" name="location[city]" id="city">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group label-floating focus">
                                    <label class="control-label">Estado</label>
                                    <input type="text" class="form-control" name="location[uf]" id="uf">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating focus">
                                    <label class="control-label">Complemento</label>
                                    <input type="text" class="form-control" name=location[complement]" id="complement">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <i class="material-icons">get_app</i>
                                    <input type="file" class="btn btn-primary" name="profile[photo]"/>Carregar foto...
                                </div>
                            </div>
                        </div>
                        <input type="text" name="ibge_number" id="ibge_number" hidden>
                        <button type="submit" class="btn btn-primary pull-right">Salvar perfil</button>
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



            $("#zip_code").change(function(){

                var zip_code = $(this).val();
                console.log(zip_code)

                $.getJSON("https://viacep.com.br/ws/"+zip_code+"/json/", function( json )
                {
                    console.log(json);
                })
                        .done(function(json)
                        {
                            $('.focus').addClass('is-focused');
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