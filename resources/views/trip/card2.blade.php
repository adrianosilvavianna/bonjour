<html>

<head>

    <style type="text/css">

        @import "https://fonts.googleapis.com/css?family=Pavanam";

        .link {
            text-decoration: none;
            -webkit-transition: all 1s;
            background-color: #2d5488;
            color: #ffffff;
        }

        h1 {
            font-weight: 100;
            font-size: 2.2em;
            color: #848484;
        }

        /*--------------------- first profile --*/

        .box {

            height: 420px;

        }

        .box h1 {
            margin: 90px 0 5px;
        }

        .box span {
            font-size: 1.2em;
        }

        a.button {
            font-size: 2em;
            padding: 8px;
            width: 180px;
            display: block;
            border-radius: 2px;
            margin: 30px auto;
        }

        a.button:hover {
            background-color: #5486c9;
        }



        .head h1 {
            margin: 15px 0 5px;
        }


        [class^="footItem"] i {
            display: block;
            font-size: 1.6em;
            margin-bottom: 5px;
            color: #fff;
        }


        .head2 h1 {
            margin: 15px 0 5px;
        }


        .container3 {
            font-family: "Pavanam", sans-serif;
            font-size: 10px;
            letter-spacing: 2px;
            box-sizing: border-box;
            position: relative;
            left: 170px;
            bottom: 300px;
        }

        .box4 {
            background: rgba(255, 255, 255, 0.55);
            border-radius: 0;
            font-size: 1em;
            color: #848484;
            height: 228px;
            text-align: center;
            width: 850px;
            box-shadow: 0px 2px 5px #000;
        }

        .image2 {
            /*background: url("https://s3-sa-east-1.amazonaws.com/logs-ale/wp-content/uploads/2015/08/VIAGEM-CARRO-31-700x467.jpg")*/
            /*no-repeat;*/
            background-size: 100%;
            width: 340px;
            height: 280px;
            position: absolute;
            left: 510px;
        }

        .profileImage2 {
            content: "";
            display: block;
            width: 125px;
            height: 125px;
            margin: 20px 50px;
            background: no-repeat center;
            background-size: 110%;
            border-radius: 50%;
            position: relative;
            top: 55px;
        }

        .word-wrap {
            position: relative;
            left: 220px;
            bottom: 80px;
            padding: 10px;
            border-top: 1px solid rgba(65, 121, 255, 0.5);
            border-bottom: 1px solid rgba(65, 121, 255, 0.5);
            width: 300px;
        }

        .box4 h1 {
            margin: 5px;
        }

        .box4 span {
            font-size: 1.2em;
        }

        a.button3 {
            background-color: #2d5488;
            font-size: 1.5em;
            padding: 8px;
            width: 100px;
            display: block;
            border: 3px solid rgba(65, 121, 255, 0.5);
            margin: 100px auto;
        }

        a.button3:hover {
            background-color: #5486c9;
        }

        .hiddenMessage {
            font-size: 30px;
            position: absolute;
            left: 180px;
            top: 100px;
            display: none;
        }

        /*--------------------- fourth profile end --*/

        /* Portrait and Landscape */

        @media only screen and (max-width: 500px) {
            .container1,
            .container2,
            .container3 {
                display: none !important;
            }
            body {
                margin: 30px auto !important;
            }
            .box {
                left: 20px !important;
            }
        }

    </style>

    <script src="https://use.fontawesome.com/b7472aa0a9.js"></script>
    <link rel="stylesheet" href="css/animations.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
<div class="mainWrapper">
    <!-- first profile -->
    <div class="box">
        {{--<div class="image"></div>--}}
        {{--<div class="profileImage"></div>--}}
        {{--<h1>EMMA THOMSON</h1>--}}
        {{--<span>GRAPHIC DESIGNER</span> <a href="#" class="button">FOLLOW</a>--}}
        {{--<div class="foot">--}}
            {{--<div class="following"><b>332</b> Following</div>--}}
            {{--<div class="followers"><b>104</b> Followers</div>--}}
        {{--</div>--}}
    </div>
    <!-- second profile -->
    {{--<div class="container1">--}}
        {{--<div class="head">--}}
            {{--<h1>EMMA THOMSON</h1> GRAPHIC DESIGNER </div>--}}
        {{--<div class="foot2"> <a href="#" class="footItem1"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a><a href="#" class="footItem2"><i class="fa fa-user" aria-hidden="true"></i></a><a href="#" class="footItem3"><i class="fa fa-thumbs-down" aria-hidden="true"></i></a>        </div>--}}
    {{--</div>--}}
    {{--<!-- third profile -->--}}

    {{--<div class="container2">--}}
        {{--<div class="head2">--}}
            {{--<h1>EMMA THOMSON</h1>--}}
            {{--<span>332 Following</span> <a href="#" class="button2">FOLLOW</a> </div>--}}
    {{--</div>--}}

    <!-- fourth profile -->
    <div class=" container3">
        <div class="box4">
            <div class="image2"><a href="#!" class="button3 link">FOLLOW</a></div>
            <div class="hiddenMessage">Thank You!</div>
            <div class="contentWrap">
                <div>
                    <img class="profileImage2" src="http://imworld.aufeminin.com/dossiers/D20101109/JUPITERIMAGES-08749547-191316_L.jpg">
                </div>

                {{--<div class="profileImage2"></div>--}}
                <div class="word-wrap">
                    <h1>EMMA THOMSON</h1>
                    <span>GRAPHIC DESIGNER</span>
                    <p>Life is only a flicker of melted ice.</p>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('assets/js/jquery-3.1.0.min.js') }}" type="text/javascript"></script>

<script >

    $( document ).ready(function() {
    $( ".button3" ).on( "click", function()
    {
        $( ".contentWrap" ).stop().fadeToggle( "slow" );
        $( ".button3" ).stop().fadeOut( "slow" );
        $( ".hiddenMessage" ).fadeIn( "slow" ).delay(3000).fadeOut("slow");
    });
    });

</script>

</body>

</html>