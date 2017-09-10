@extends('layouts.app')

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">Editar meus telefones</h4>
                </div>
                <div class="card-content">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <input type="text" name="phone" class="form-control" placeholder="Telefone" value="{{ $phone->phone }}">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <input type="text" name="ibge_number" id="ibge_number" hidden>
                <button type="submit" class="btn btn-primary pull-right">Salvar perfil</button>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ajaxStart($.blockUI).ajaxStop($.unblockUI).ready(function () {

        $("#get_code").change(function () {

            var zip_code = $(this).val();
            console.log(zip_code)

            $.getJSON("https://viacep.com.br/ws/" + zip_code + "/json/", function (json)
            {
                console.log(json);
            })
                    .done(function (json)
                    {
                        $('#address').val(json.logradouro);
                        $('#district').val(json.bairro);
                        $('#city').val(json.localidade);
                        $('#uf').val(json.uf);
                        $('#ibge_number').val(json.ibge);
                        $('#complement').val(json.complemento);
                        btn.html(old);

                    })
                    .fail(function ()
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