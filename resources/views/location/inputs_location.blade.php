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