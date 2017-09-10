@extends('layouts.app')

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">Edit Profile</h4>
                    <p class="category">Complete your profile</p>
                </div>
                <div class="card-content">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <input type="text" name="name" class="form-control" placeholder="Nome" value="{{ $profile }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Sobrenome</label>
                                    <input type="text" name="last_name" class="form-control" >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">CEP</label>
                                    <input type="text" name="zip_code" id="get_code" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group label-floating">
                                    <label class="control-label">Endereço</label>
                                    <input type="text" name="address" class="form-control" id="address">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Cidde</label>
                                    <input type="text" class="form-control" name="city" id="city">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Estado</label>
                                    <input type="text" class="form-control" name="uf" id="uf">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Complemento</label>
                                    <input type="text" class="form-control" name=complement id="complement">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <i class="material-icons">get_app</i>
                                    <input type="file" class="btn btn-primary" name="photo"/>Carregar foto...
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