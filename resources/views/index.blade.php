<!DOCTYPE HTML>
<!--
        Hyperspace by HTML5 UP
        html5up.net | @ajlkn
        Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
        <title>Bonjou</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]>
        <script src="{{ asset('web/assets/js/ie/html5shiv.js') }}"></script><![endif]-->
        <link rel="stylesheet" href="{{ asset('web/assets/css/main.css') }}" />
        <!--[if lte IE 9]>
        <link rel="stylesheet" href="{{ asset('web/assets/css/ie9.css')}}"/><![endif]-->
        <!--[if lte IE 8]>
        <link rel="stylesheet" href="{{ asset('web/assets/css/ie8.css')}}"/><![endif]-->
    </head>
    <body>

        <!-- Sidebar -->
        <section id="sidebar">
            <div class="inner">
                <nav>
                    <ul>
                        <li><a href="#intro">{{ nomeProjeto }}</a></li>
                        <li><a href="#one">{{ oProjeto }}</a></li>
                        <li><a href="#two">{{ ajudaEinformacoes }}</a></li>
                        <li><a href="#three">{{ contato }}</a></li>
                    </ul>
                </nav>
            </div>
        </section>

        <!-- Wrapper -->
        <div id="wrapper">

            <!-- Intro -->
            <section id="intro" class="wrapper style1 fullscreen fade-up">
                <div class="inner">
                    <h1>{{ nomeProjeto }}</h1>
                    <p>
                        {{ significadoBonjou }}
                    </p>
                    <ul class="actions">
                        @if(auth()->guest())
                        <li><a href="/login" class="button scrolly">{{ btnLogin }}</a></li>
                        <li><a href="/register" class="button scrolly">{{ btnCadastrarse }}</a></li>
                        @else
                        <li><a href="/user/home" class="button scrolly">{{ btnEntrar }}</a></li>
                        @endif
                        <li>
                            <a href="?lang=pt-br"><img src="{{ asset('/img/lang/pt-br.png') }}" alt="Idioma Português"></a>
                            <a href="?lang=en"><img src="{{ asset('/img/lang/en.png') }}" alt="Idioma Inglês"></a>
                            <a href="?lang=fr"><img src="{{ asset('/img/lang/franca.png') }}" alt="Idioma Francês"></a>
                        </li>
                    </ul>
                </div>
            </section>

            <!-- One -->
            <section id="one" class="wrapper style2 spotlights">
                <section>
                    <a href="#" class="image"><img src="{{ asset('web/images/img1.jpg') }}" alt="" data-position="center center" /></a>
                    <div class="content">
                        <div class="inner">
                            <h2>{{ oProjeto }}</h2>
                            <p>{{ objetivoProjeto1 }}</p>
                            <p> {{ objetivoProjeto2 }}</p>
                            <p>{{ objetivoProjeto3 }}</p>
                        </div>
                    </div>
                </section>
                <section>
                    <a href="#" class="image"><img src="{{ asset('web/images/carpool3.jpeg') }}" alt="" data-position="top center" /></a>
                    <div class="content">
                        <div class="inner">
                            <h2>{{ planetaUmSo }}</h2>
                            <p>{{ sobrePlanetaUmSo }}</p>
                        </div>
                    </div>
                </section>
                <section>
                    <a href="#" class="image"><img src="{{ asset('web/images/img2.jpg') }}" alt="" data-position="25% 25%" /></a>
                    <div class="content">
                        <div class="inner">
                            <h2>{{ localEncontros }}</h2>
                            <p>Instituto Tibagi</br>
                                Rua Conselheiro Laurindo -  nº 600 - piso 3</br>
                                CEP: 80060-100</br>
                                Centro, Curitiba - PR</br>
                                Tel: (41) 3024-9848 (41) 3029-7393</br>
                            </p>

                        </div>
                    </div>
                </section>
            </section>

            <!-- Two -->
            <section id="two" class="wrapper style3 fade-up">
                <div class="inner">
                    <h2>{{ ajudaInfos1 }}</h2>
                    <p>{{ ajudaInfos2 }}</p>
                    <div class="features">
                        <section>
                            <span class="icon major fa-lightbulb-o"></span>
                            <h3>Qual a ideia?</h3>
                            <p>O sistema visa integração e caronas entre migrantes haitianos e pessoas de Curitiba</p>
                        </section>
                        <section>
                            <span class="icon major fa-ellipsis-h"></span>
                            <h3>Extenções</h3>
                            <p>Futuramente será ampliado para refugiados e migrantes de outras nacionalidades</p>
                        </section>
                        <section>
                            <span class="icon major  fa-cab"></span>
                            <h3>Como funciona?</h3>
                            <p>O sistema possibilita você solicitar e oferecer caronas, podendo ser agendadas previamente, auxiliando a locomoção dos refugiados e migrantes </p>
                        </section>
                        <section>
                            <span class="icon major fa-child"></span>
                            <h3>Participantes do projeto</h3>
                            <p>Sistema criado em conjunto com o curso de Alálise e Desenvolvimento de sistemas da Universidade Tuiuti do Paraná</p>
                        </section>
                    </div>
                </div>
            </section>

            <!-- Three -->
            <section id="three" class="wrapper style1 fade-up">
                <div class="inner">
                    <h2>{{ contato }}</h2>
                    <p>{{ escrevaSuaDuvida }}</p>
                    <div class="split style1">
                        <section>
                            <form method="post" action="#">
                                <div class="field half first">
                                    <label for="name">{{ nome }}</label>
                                    <input type="text" name="name" id="name" />
                                </div>
                                <div class="field half">
                                    <label for="email">{{ email }}</label>
                                    <input type="text" name="email" id="email" />
                                </div>
                                <div class="field">
                                    <label for="message">{{ mensagem }}</label>
                                    <textarea name="message" id="message" rows="5"></textarea>
                                </div>
                                <ul class="actions">
                                    <li><a href="" class="button submit">{{ btnEnviarMsg }}</a></li>
                                </ul>
                            </form>
                        </section>

                    </div>
                </div>
            </section>

        </div>

        <!-- Footer -->
        <footer id="footer" class="wrapper style1-alt">
            <div class="inner">
                <ul class="menu">
                    <li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
                </ul>
            </div>
        </footer>

        <!-- Scripts -->
        <script src="{{ asset('web/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('web/assets/js/jquery.scrollex.min.js') }}"></script>
        <script src="{{ asset('web/assets/js/jquery.scrolly.min.js') }}"></script>
        <script src="{{ asset('web/assets/js/skel.min.js') }}"></script>
        <script src="{{ asset('web/assets/js/util.js') }}"></script>
        <!--[if lte IE 8]>
<script src="{{ asset('web/assets/js/ie/respond.min.js') }}"></script><![endif]-->
        <script src="{{ asset('web/assets/js/main.js') }}"></script>

    </body>
</html>
