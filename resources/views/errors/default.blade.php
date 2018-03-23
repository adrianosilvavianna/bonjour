<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
</head>

<style>
    body {
        position: relative;
        margin: 0 auto;
        font-family: Montserrat, sans-serif;
    }

    .container-fluid {
        margin: 0 auto;
    }

    h2 {
        font-weight: bold;
        font-size: 3.75em;
        color: #ee6052;
        margin-top: 50px;
    }

    #error {
        font-size: 10em;
    }

    img.displayed {
        display: block;
        margin-left: auto;
        margin-right: auto;
        height: 50%;
        width: 50%;
    }

    .footer {
        margin-top: 50px;
        padding: 10px;
        background: #595859;
        color: #fff;
        text-align: center;
    }

    @media (max-width: 980px) {
        #error {
            text-align: center;
            font-size: 12em;
        }

        img.displayed {
            height: 20%;
            width: 20%;
        }
    }
    @media (max-width: 320px) {
        #error {
            text-align: center;
            font-size: 11em;
        }

        img.displayed {
            height: 30%;
            width: 30%;
        }
    }
</style>

<body>
<div id="main" class="container-fluid">
    <h2 align="center">Ops, algo não está certo.</h2>
    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-6">
            <img src="{{ asset('assets/img/quebrou_bonjou.png') }}" alt="Page not found bonjou" class="displayed">
        </div>
        <div class="col-xs-12 col-md-6 col-lg-6">
            <h2 id="error">:/</h2><br>
            <h3>Desculpe, estamos estudando o que pode ter acontecido.</h3><br><br>
        </div>
        <!-- /.col-xs-12 -->
    </div>
    <!-- /.container -->


</div>
</body>
<script>

</script>
</html>