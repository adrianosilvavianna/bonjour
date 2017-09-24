<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <title>Google Maps API v3: Criando rotas</title>
    <link href="{{ asset('css/maps/estilo_route.css') }}" type="text/css" rel="stylesheet" />
</head>

<body>
<div id="site">

    <h1>Google Maps API v3: Criando rotas</h1>

    <form method="post" action="index.html">
        <fieldset>
            <legend>Criar rotas</legend>

            <div>
                <label for="txtEnderecoPartida">Endereço de partida:</label>
                <input type="text" id="txtEnderecoPartida" name="txtEnderecoPartida" placeholder=" Rua, n° - Cidade - Estado"/>
            </div>

            <div>
                <label for="txtEnderecoChegada">Endereço de chegada:</label>
                <input type="text" id="txtEnderecoChegada" name="txtEnderecoChegada" placeholder=" Rua, n° - Cidade - Estado"/>
            </div>

            <div>
                <input type="submit" id="btnEnviar" name="btnEnviar" value="Enviar" />
            </div>
        </fieldset>
    </form>

    <div id="mapa"></div>

    <div id="trajeto-texto"></div>

</div>

<script type="text/javascript" src="{{ asset('js/maps/jquery.min.js') }}"></script>

<!-- Maps API Javascript -->
<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="{{ asset('js/maps/jquery-ui.custom.min.js') }}"></script>
<!-- Arquivo de inicialização do mapa -->
<script type="text/javascript" src="{{ asset('js/maps/mapa_route.js') }}"></script>
</body>
</html>