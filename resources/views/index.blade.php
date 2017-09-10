<!DOCTYPE HTML>
<!--
    Stellar by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
        <title>Bonjou</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="{{ asset('web/assets/css/main.css') }}" />
        <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
        <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    </head>
    <body>

        <!-- Wrapper -->
            <div id="wrapper">

                <!-- Nav -->
                    <nav id="nav">
                        <ul>
                            <li><a href="#intro" class="active">Sobre o Projeto</a></li>
                            <li><a href="#first">Sobre a ONG</a></li>
                            <li><a href="#second">Contatos</a></li>
                            <li><a href="login">Entrar</a></li>
                        </ul>
                    </nav>

                <!-- Main -->
                    <div id="main">

                        <!-- Introduction -->
                            <section id="intro" class="main">
                                <div class="spotlight">
                                    <div class="content">
                                        <header class="major">
                                            <h2>Sobre o Projeto</h2>
                                        </header>
                                        <p>Sed lorem ipsum dolor sit amet nullam consequat feugiat consequat magna
                                        adipiscing magna etiam amet veroeros. Lorem ipsum dolor tempus sit cursus.
                                        Tempus nisl et nullam lorem ipsum dolor sit amet aliquam.</p>
                                        <ul class="actions">
                                            <li><a href="generic.html" class="button">Learn More</a></li>
                                        </ul>
                                    </div>
                                    <span class="image"><img src="{{ asset('web/images/pic01.jpg') }}" alt="" /></span>
                                </div>
                            </section>

                        <!-- First Section -->
                            <section id="first" class="main special">
                                <header class="major">
                                    <h2>Sobre a ONG</h2>
                                </header>
                                <p>O projeto da ONG visa a integração de refugiados e migrantes de todas as nacionalidades e apátridas com a população de Curitiba. É um projeto apartidário e laico, onde as diferentes religiões são bem-vindas, assim como pessoas de todas as etnias e povos</p>
                                <ul class="features">
                                    <li>
                                        <span class="icon major style1 fa-code"></span>
                                        <h3>Ipsum consequat</h3>
                                        <p>Sed lorem amet ipsum dolor et amet nullam consequat a feugiat consequat tempus veroeros sed consequat.</p>
                                    </li>
                                    <li>
                                        <span class="icon major style3 fa-copy"></span>
                                        <h3>Amed sed feugiat</h3>
                                        <p>Sed lorem amet ipsum dolor et amet nullam consequat a feugiat consequat tempus veroeros sed consequat.</p>
                                    </li>
                                    <li>
                                        <span class="icon major style5 fa-diamond"></span>
                                        <h3>Dolor nullam</h3>
                                        <p>Sed lorem amet ipsum dolor et amet nullam consequat a feugiat consequat tempus veroeros sed consequat.</p>
                                    </li>
                                </ul>
                                <footer class="major">
                                    <ul class="actions">
                                        <li><a href="generic.html" class="button">Learn More</a></li>
                                    </ul>
                                </footer>
                            </section>

                        <!-- Second Section -->
                            <section id="second" class="main special">
                                <header class="major">
                                    <h2>Contato</h2>
                                   <div class="container">
                                        <form>
                                        <div class="form-group">
                                          <label for="usr">E-mail:</label>
                                          <input type="text" class="form-control" id="usr">
                                        </div>
                                        <div class="form-group">
                                          <label for="ass">Assunto:</label>
                                          <input type="text" class="form-control" id="ass">
                                        </div>
                                        <div class="container">
  
                                          <form>
                                            <div class="form-group">
                                              <label for="comment">Mensagem:</label>
                                              <textarea class="form-control" rows="5" id="comment"></textarea>
                                            </div>
                                          </form>
                                        </div>
                                      </form>
                                    </div>

                                <footer class="major">
                                    <ul class="actions">
                                        <li><a href="generic.html" class="button">Enviar</a></li>
                                    </ul>
                                </footer>
                            </section>

                            <!-- Get Started
                            <section id="cta" class="main special">
                                <header class="major">
                                    <h2>Entrar</h2>
                                    <p>Donec imperdiet consequat consequat. Suspendisse feugiat congue<br />
                                    posuere. Nulla massa urna, fermentum eget quam aliquet.</p>
                                </header>
                                <footer class="major">
                                    <ul class="actions">
                                        <li><a href="generic.html" class="button special">Get Started</a></li>
                                        <li><a href="generic.html" class="button">Learn More</a></li>
                                    </ul>
                                </footer>
                            </section>-->

                    </div>

                <!-- Footer -->
                    <footer id="footer">
                        <section>
                            <h2>Links Uteis</h2>
                            <p>Sed lorem ipsum dolor sit amet et nullam consequat feugiat consequat magna adipiscing tempus etiam dolore veroeros. eget dapibus mauris. Cras aliquet, nisl ut viverra sollicitudin, ligula erat egestas velit, vitae tincidunt odio.</p>
                            <ul class="actions">
                                <li><a href="generic.html" class="button">Learn More</a></li>
                            </ul>
                        </section>
                        <section>
                            <h2>Dados da ONG</h2>
                            <dl class="alt">
                                <dt>Endereço</dt>
                                <dd>1234 Somewhere Road &bull; Nashville, TN 00000 &bull; USA</dd>
                                <dt>Telefone</dt>
                                <dd>(000) 000-0000 x 0000</dd>
                                <dt>Email</dt>
                                <dd><a href="#">information@untitled.tld</a></dd>
                            </dl>
                            <ul class="icons">
                                <li><a href="https://www.facebook.com/oplanetaeumso" target="_blank" class="icon fa-facebook alt"><span class="label">Facebook</span></a></li>
                                <li><a href="#" class="icon fa-twitter alt"><span class="label">Twitter</span></a></li>
                                <li><a href="#" class="icon fa-instagram alt"><span class="label">Instagram</span></a></li>
                                <li><a href="#" class="icon fa-github alt"><span class="label">GitHub</span></a></li>
                                <li><a href="#" class="icon fa-dribbble alt"><span class="label">Dribbble</span></a></li>
                            </ul>
                        </section>
                        <p class="copyright">&copy; Untitled. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
                    </footer>

            </div>

        <!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/jquery.scrollex.min.js"></script>
            <script src="assets/js/jquery.scrolly.min.js"></script>
            <script src="assets/js/skel.min.js"></script>
            <script src="assets/js/util.js"></script>
            <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
            <script src="assets/js/main.js"></script>

    </body>
</html>