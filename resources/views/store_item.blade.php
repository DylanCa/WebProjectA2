<!DOCTYPE HTML>
<html>

<head>
    <title>{{$item->name}}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/css/main.css" />  
    <link rel="stylesheet" href="/assets/css/mainStore.css" />
    
    
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <link rel="icon" href="images/tab_icon.jpg" sizes="16x16">
</head>

<body>
	<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner2">
							<header>
								<h1>{{$item->name}}</h1>
								<span class="image main"><img src="/images/store{{$item->id}}.jpg" alt="" /></span>
								<p>Prix: {{$item->price}}€</p>
								<p>Description: {{$item->description}}</p>

							</header>
							
						</div>
					</div>
			</div>


		<!-- Wrapper -->
			<div id="wrapper">


				<!-- Main -->
					<div id="main">
						<div class="inner2">
							<h1>Generic Page</h1>
							<span class="image main"><img src="/images/pic13.jpg" alt="" /></span>
							<p>Some text</p>
						</div>
					</div>


			</div>

<!-- RIQUE BOUTON-POUSSOIR
€4,90
La Brique la plus simple pour comprendre comment fonctionnent les fameuses « briques déclencheuses » ! En associant plusieurs d'entre eux, créer un système logique devient aussi simple qu'efficace : un bouton déclenche une action, l'autre l’arrête. Seul, il peut allumer et éteindre une LED sans la moindre difficulté.

Quelques idées de créations possibles grâce à la brique Bouton :

· Le jeu du buzzer
· Un jeu de réflexe
· Des dizaines de jeux vidéos
· Un piano
MADE IN FRANCE - Fabriqué à Toulouse, avec passion

Garantie 1 an - Expédié en 24h - Conseil et assistance illimités
 -->
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

@include('sidebar');


</body>
</html>