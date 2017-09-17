@section('css')
   <link href="{{ asset('css/maps/estilo.css') }}" type="text/css" rel="stylesheet" />
 @stop
<div id="apresentacao">


    <form method="post" action="{{ route('user.profile.store') }}">

        <fieldset>
            <div class="row">

                <div class="col-md-4 {{ $errors->has('name') ? ' has-error' : '' }}">
                    <div class="form-group label-floating ">
                        <input type="text" id="name" name="name" class="form-control" placeholder="Nome">
                    </div>
                    @if ($errors->has('name'))
                        <span class="help-block">
                        <strong class="red-text">{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="col-md-7 {{ $errors->has('txtEndereco') ? ' has-error' : '' }}">
                    <div class="form-group label-floating ">
                        <input type="text" id="txtEndereco" name="txtEndereco" class="form-control" placeholder="Endereço">
                    </div>
                    @if ($errors->has('txtEndereco'))
                        <span class="help-block">
                            <strong class="red-text">{{ $errors->first('txtEndereco') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary pull-right">Salvar</button>
                </div>

            </div>

            <div id="mapa"></div>

            <input type="hidden" id="txtLatitude" name="txtLatitude" />
            <input type="hidden" id="txtLongitude" name="txtLongitude" />

        </fieldset>
    </form>


</div>

@section('scripts')
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBOXe8VnXBmjiT0rIjRYIetQyLnG-WUCa4&amp;sensor=false"></script>
    <script type="text/javascript" src="{{ asset('js/maps/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/maps/mapa.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/maps/jquery-ui.custom.min.js') }}"></script>
@show

</body>
</html>
