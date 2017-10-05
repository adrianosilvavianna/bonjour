<html>

<head>
    <style>
        /* Libs */
        @import url("//fonts.googleapis.com/css?family=Lato:400,300,100");
        @import url("//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css");
        /* General */
        * {
            box-sizing: border-box;
            outline: none;
        }

        body {
            background: #bdc3c7 url("http://www.subirimagenes.com/imagedata.php?url=http://s2.subirimagenes.com/otros/9067576mar.jpg") 0 0 no-repeat;
            background-size: cover 100%;
            color: #7f8c8d;
            font-size: 16px;
            font-weight: 300;
            font-family: 'Lato';
            height: 100%;
            padding: 20px 0;
        }

        a {
            -moz-transition: all 0.1s ease-out;
            -o-transition: all 0.1s ease-out;
            -webkit-transition: all 0.1s ease-out;
            transition: all 0.1s ease-out;
            color: #e74c3c;
        }
        a:hover {
            color: #4BD3F4;
        }

        /* Card */
        .card {
            background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuNSIgeTE9IjAuMCIgeDI9IjAuNSIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZmZmZmZiIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iI2VjZjBmMSIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
            background-size: 100%;
            background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #ffffff), color-stop(100%, #ecf0f1));
            background-image: -moz-linear-gradient(top, #ffffff 0%, #ecf0f1 100%);
            background-image: -webkit-linear-gradient(top, #ffffff 0%, #ecf0f1 100%);
            background-image: linear-gradient(to bottom, #ffffff 0%, #ecf0f1 100%);
            -moz-box-shadow: 0 3px 10px rgba(0, 0, 0, 0.5);
            -webkit-box-shadow: 0 3px 10px rgba(0, 0, 0, 0.5);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.5);
            display: block;
            position: relative;
            padding: 20px;
        }

        .card .card-modal {
            -moz-transition: all 0.3s cubic-bezier(0.19, 1, 0.22, 1);
            -o-transition: all 0.3s cubic-bezier(0.19, 1, 0.22, 1);
            -webkit-transition: all 0.3s cubic-bezier(0.19, 1, 0.22, 1);
            transition: all 0.3s cubic-bezier(0.19, 1, 0.22, 1);
            -moz-border-radius: 10px;
            -webkit-border-radius: 10px;
            border-radius: 10px;
            background-color: #bdc3c7;
            color: white;
            display: none;
            position: absolute;
            top: 40px;
            left: 130px;
            z-index: 2;
            padding: 20px;
        }
        .card .card-modal.active {
            left: 140px;
        }
        .card .card-modal:before {
            content: "";
            border-style: solid;
            border-width: 15px 15px 15px 0;
            border-color: transparent #bdc3c7 transparent transparent;
            width: 0;
            height: 0;
            display: block;
            position: absolute;
            top: 20%;
            left: -15px;
        }

        .card .card-image {
            position: absolute;
            top: 20px;
            left: 20px;
        }
        .card .card-image .btn {
            -moz-border-radius: 50px;
            -webkit-border-radius: 50px;
            border-radius: 50px;
            background-position: -45px 0;
            background-repeat: no-repeat;
            background-size: cover;
            border: 0;
            cursor: pointer;
            width: 100px;
            height: 100px;
            overflow: hidden;
            position: absolute;
            padding: 0;
        }
        .card .card-image .btn:after {
            content: "";
            -moz-transition: all 0.3s cubic-bezier(0.19, 1, 0.22, 1);
            -o-transition: all 0.3s cubic-bezier(0.19, 1, 0.22, 1);
            -webkit-transition: all 0.3s cubic-bezier(0.19, 1, 0.22, 1);
            transition: all 0.3s cubic-bezier(0.19, 1, 0.22, 1);
            -moz-border-radius: 50px;
            -webkit-border-radius: 50px;
            border-radius: 50px;
            border: rgba(255, 255, 255, 0.4) 50px solid;
            width: 100%;
            height: 100%;
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 5;
        }
        .card .card-image .btn:hover:after {
            border-width: 0;
        }
        .card .card-image .btn img {
            display: none;
        }

        .card .card-info {
            margin-left: 120px;
        }

        .card .card-info .name {
            font-size: 28px;
            font-weight: 100;
            display: inline-block;
            vertical-align: top;
            position: relative;
        }

        .card .card-info .social-network {
            font-size: 0;
            display: inline-block;
            vertical-align: top;
            overflow: hidden;
            margin-bottom: 15px;
        }
        @media (min-width: 639px) {
            .card .card-info .social-network {
                float: right;
                margin: 5px 0 0;
            }
        }
        .card .card-info .social-network .icon {
            background-color: #bdc3c7;
            border: 0;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
            width: 32px;
            height: 32px;
            display: inline-block;
            vertical-align: top;
            overflow: hidden;
            position: relative;
            margin-left: 10px;
        }
        .card .card-info .social-network .icon:first-child {
            margin: 0;
        }
        .card .card-info .social-network .icon:before {
            -moz-transition: all 0.5s cubic-bezier(0.19, 1, 0.22, 1);
            -o-transition: all 0.5s cubic-bezier(0.19, 1, 0.22, 1);
            -webkit-transition: all 0.5s cubic-bezier(0.19, 1, 0.22, 1);
            transition: all 0.5s cubic-bezier(0.19, 1, 0.22, 1);
            -moz-border-radius: 16px;
            -webkit-border-radius: 16px;
            border-radius: 16px;
            content: "";
            width: 32px;
            height: 32px;
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
        }
        .card .card-info .social-network .icon.facebook:before {
            border: rgba(59, 89, 152, 0.7) 0 solid;
        }
        .card .card-info .social-network .icon.facebook:hover:before {
            border-width: 30px;
        }
        .card .card-info .social-network .icon.twitter:before {
            border: rgba(15, 191, 242, 0.7) 0 solid;
        }
        .card .card-info .social-network .icon.twitter:hover:before {
            border-width: 30px;
        }
        .card .card-info .social-network .icon.youtube:before {
            border: rgba(179, 18, 23, 0.7) 0 solid;
        }
        .card .card-info .social-network .icon.youtube:hover:before {
            border-width: 30px;
        }
        .card .card-info .social-network .icon i {
            color: white;
            font-size: 16px;
            text-align: center;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 50%;
            z-index: 1;
            margin-top: -7px;
        }

        .card .card-info hr {
            margin: 0 0 15px;
        }

    </style>
    <script>
        /* From img to background */
        bg_image_replace(".card-image a img", ".card-image a");

        function bg_image_replace(image, parent){
            $(image).each(function(index,elem){

                var src = $(elem).attr("src"),
                        $parent = $(elem).closest(parent);

                $parent.css("background-image","url(" + src + ")");
            });
        }


        /* Review */
        $( '.card-image' ).mouseover(function(){
            $('.card-modal').fadeIn(100).toggleClass('active');
        }).mouseout(function(){
            $('.card-modal').fadeOut(100).toggleClass('active');
        });
    </script>
</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-xs-12">

            <div class="card">

                <div class="card-image">
                    <a href="#" type="button" class="btn">
                        <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="user-image" />
                    </a>
                </div>

                <div class="card-modal">Take a look at my Profile!</div>

                <div class="card-info">

                    <div class="name">
                        <p>Nunc Lorem Interdum</p>
                    </div>

                    <div class="social-network">
                        <a href="#" class="icon youtube">
                            <i class="fa fa-youtube"></i>
                        </a>
                        <a href="#" class="icon twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#" class="icon facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </div>

                    <hr>

                    <div class="content">
                        <p>
                            <b>Info:</b>
                            Praesent faucibus sem tortor, sed imperdiet enim interdum in. Etiam feugiat rutrum ex, quis maximus quam commodo eu. Pellentesque eget tortor convallis, vestibulum tortor in, lacinia diam.
                        </p>
                        <p><b>Skills:</b> Feugiat, Ipsum, Pellentesque, Maximus</p>
                        <p><b>Website:</b> <a href="https://codepen.io/jaguilera">www.codepen.io</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mainWrapper">
    <!-- first profile -->
    <div class="box">

    </div>
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

</body>
</html>

