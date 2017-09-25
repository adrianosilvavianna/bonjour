@section('css')
   <link href="{{ asset('css/maps/estilo_route.css') }}" type="text/css" rel="stylesheet" />
 @stop
<div id="apresentacao">


    <form method="post" action="{{ route('user.trip.store') }}">

        <fieldset>
            <div class="row">
                <div class="col-md-6 {{ $errors->has('txtEndereco') ? ' has-error' : '' }}">
                    <div class="form-group  ">
                        <label class="control-label">Onde Estou</label>
                        <input type="text" class="form-control" id="txtEnderecoPartida" name="endereco_partida"/>
                        {{--<input type="text" id="txtEndereco" name="txtEndereco" class="form-control" placeholder="Endereço">--}}
                    </div>
                    @if ($errors->has('txtEndereco'))
                        <span class="help-block">
                            <strong class="red-text">{{ $errors->first('txtEndereco') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-5 {{ $errors->has('txtEndereco') ? ' has-error' : '' }}">
                    <div class="form-group  ">
                        <label class="control-label">Para onde vou</label>
                        <input type="text" class="form-control" id="txtEnderecoChegada" name="endereco_chegada"/>
                        {{--<input type="text" id="txtEndereco" name="txtEndereco" class="form-control" placeholder="Endereço">--}}
                    </div>
                    @if ($errors->has('txtEndereco'))
                        <span class="help-block">
                            <strong class="red-text">{{ $errors->first('txtEndereco') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="btnEnviar" id="btnEnviar"><i class="material-icons">search</i>  </input>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 {{ $errors->has('txtEndereco') ? ' has-error' : '' }}">
                    <div class="form-group  ">
                        <label class="control-label">Data de partida</label>
                        <input type="date" class="form-control" name="date">
                        {{--<input type="text" id="txtEndereco" name="txtEndereco" class="form-control" placeholder="Endereço">--}}
                    </div>
                    @if ($errors->has('txtEndereco'))
                        <span class="help-block">
                            <strong class="red-text">{{ $errors->first('txtEndereco') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-6 {{ $errors->has('txtEndereco') ? ' has-error' : '' }}">
                    <div class="form-group  ">
                        <label class="control-label">Hora de partida</label>
                        <input type="time" class="form-control" name="time">
                        {{--<input type="text" id="txtEndereco" name="txtEndereco" class="form-control" placeholder="Endereço">--}}
                    </div>
                    @if ($errors->has('txtEndereco'))
                        <span class="help-block">
                            <strong class="red-text">{{ $errors->first('txtEndereco') }}</strong>
                        </span>
                    @endif
                </div>

            </div>

            <div class="row">
                <input type="hidden" id="txtLatitude" name="txtLatitude" />
                <input type="hidden" id="txtLongitude" name="txtLongitude" />

            </div>



            <div id="mapa"></div>


            <div id="trajeto-texto"></div>

            <button type="submit" class="btn btn-primary pull-right" name="btnEnviar" id="btnEnviar"> Salvar </button>

        </fieldset>
    </form>


</div>

@section('scripts')
    {{--<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBOXe8VnXBmjiT0rIjRYIetQyLnG-WUCa4&amp;sensor=false"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('js/maps/jquery.min.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('js/maps/mapa.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('js/maps/jquery-ui.custom.min.js') }}"></script>--}}

    <script type="text/javascript" src="{{ asset('js/maps/jquery.min.js') }}"></script>

    <!-- Maps API Javascript -->
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBOXe8VnXBmjiT0rIjRYIetQyLnG-WUCa4&amp;sensor=false"></script>
    <script type="text/javascript" src="{{ asset('js/maps/jquery-ui.custom.min.js') }}"></script>
    <!-- Arquivo de inicialização do mapa -->
    <script type="text/javascript" src="{{ asset('js/maps/mapa_route.js') }}"></script>



@show
