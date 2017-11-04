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
							<li><a href="#intro">Bonjou</a></li>
							<li><a href="#one">O Projeto Bonjou</a></li>
							<li><a href="#two">Ajuda e Informações uteis</a></li>
							<li><a href="#three">Contato</a></li>
						</ul>
					</nav>
				</div>
			</section>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Intro -->
					<section id="intro" class="wrapper style1 fullscreen fade-up">
						<div class="inner">
							<h1>Bonjou</h1>
							<p>O projeto Bonjou, que significa "Bom Dia" em dialeto creóle, pretende ajudar na questão da forte evasão escolar, por falta de meios de transporte, além de promover a aproximação entre Brasileiros e Haitianos</a>.</p>
							<ul class="actions">
								@if(auth()->guest())
									<li><a href="/login" class="button scrolly">Login</a></li>
								@else
									<li><a href="{{ route('user.home') }}" class="button scrolly">Entrar</a></li>
								@endif
							</ul>
						</div>
					</section>

				<!-- One -->
					<section id="one" class="wrapper style2 spotlights">
						<section>
							<a href="#" class="image"><img src="{{ asset('web/images/pic01.png') }}" alt="" data-position="center center" /></a>
							<div class="content">
								<div class="inner">
									<h2>O Projeto Bonjou</h2>
									<p>O projeto visa a integração e caronas entre refugiados, migrantes de todas as nacionalidades e pessoas de Curitiba.</p>
									<p> Sistema Web que possíbilita solicitar e oferecer caronas podendo ser agendadas previamente, auxiliando a locomoção dos refugiados e migrantes.</p>
									<p>Sistema criado em conjunto com o curso de Analise e Desenvolvimento de Sistemas da Universidade Tuiuti do Paraná</p>
								</div>
							</div>
						</section>
						<section>
							<a href="#" class="image"><img src="{{ asset('web/images/pic02.png') }}" alt="" data-position="top center" /></a>
							<div class="content">
								<div class="inner">
									<h2>Projeto O Planeta é um só</h2>
									<p>O projeto funciona em formato de encontros que visa a integração dos refugiados e migrantes de todas as nascionalidades
									com pessoas de curitiba que queiram se engajar na inclusão deste grupo na vida da cidade.</p>
								</div>
							</div>
						</section>
						<section>
							<a href="#" class="image"><img src="{{ asset('web/images/pic02.jog') }}" alt="" data-position="25% 25%" /></a>
							<div class="content">
								<div class="inner">
									<h2>Localização dos encontros</h2>
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
							<h2>Ajuda e Informações Úteis</h2>
							<p>Localização das escolas, locais para fazer documentos necessários, locais de apoio ao imigrante e contatos uteis.</p>
							<div class="features">
								<section>
									<span class="icon major fa-code"></span>
									<h3>Lorem ipsum amet</h3>
									<p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
								</section>
								<section>
									<span class="icon major fa-lock"></span>
									<h3>Aliquam sed nullam</h3>
									<p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
								</section>
								<section>
									<span class="icon major fa-cog"></span>
									<h3>Sed erat ullam corper</h3>
									<p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
								</section>
								<section>
									<span class="icon major fa-desktop"></span>
									<h3>Veroeros quis lorem</h3>
									<p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
								</section>
								<section>
									<span class="icon major fa-chain"></span>
									<h3>Urna quis bibendum</h3>
									<p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
								</section>
								<section>
									<span class="icon major fa-diamond"></span>
									<h3>Aliquam urna dapibus</h3>
									<p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
								</section>
							</div>

					</section>

				<!-- Three -->
					<section id="three" class="wrapper style1 fade-up">
						<div class="inner">
							<h2>Contato</h2>
							<p>Escreva a sua duvida, sujestão, pergunta ou escreva uma mensagem pedindo para ser apoiador do projeto O Planeta é um Só.</p>
							<div class="split style1">
								<section>
									<form method="post" action="#">
										<div class="field half first">
											<label for="name">Name</label>
											<input type="text" name="name" id="name" />
										</div>
										<div class="field half">
											<label for="email">Email</label>
											<input type="text" name="email" id="email" />
										</div>
										<div class="field">
											<label for="message">Message</label>
											<textarea name="message" id="message" rows="5"></textarea>
										</div>
										<ul class="actions">
											<li><a href="" class="button submit">Enviar Mensagem</a></li>
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