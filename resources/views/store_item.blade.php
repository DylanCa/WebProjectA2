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

				<!-- Header --><!-- 
					<header id="header">
						<div class="inner">

								<a href="index.html" class="logo">
									<span class="symbol"><img src="images/logo.svg" alt="" /></span><span class="title">Phantom</span>
								</a>
					    </div>
					</header> -->

				<!-- Main -->
					<div id="main">
						<div class="inner2">
							<header>
								<h1>This your item :{{$item->name}}  </h1>
								<p>ID: {{$item->id}}</p>
								<p>Nom: {{$item->name}}</p>
								<p>Prix: {{$item->price}}€</p>
								<p>Description: {{$item->description}}</p>

							</header>
							
						</div>
					</div>

    <!-- Sidebar -->
    <div id="sidebar">
        <!-- Logo -->
        <h1 id="logo"><a href="/">BDE EXIA</a></h1>
        <!-- Text -->
        <section class="box text-style1">
            <div class="inner">
                <p>
                    <a href='profil'>{{ App\User::where('id', \Cookie::get('id') )->first()->name }} {{ App\User::where('id', \Cookie::get('id') )->first()->surname}}</a>
                    <br/> <a href='logout'>Logout</a>
                </p>
            </div>
        </section>
        <!-- Nav -->
        <nav id="nav">
            <ul>
                <li class="current"><a href="/">Homepage</a></li>
                <li><a href="/club">Clubs</a></li>
                <li><a href="/event">Event 1</a></li>
                <li><a href="/event">Event 2</a></li>
                <li><a href="/store">Store</a></li>
            </ul>
        </nav>
        <!-- Recent Posts -->
        <section class="box recent-posts">
            <header>
                <h2>Recent Events</h2>
            </header>
            <ul>
                <li><a href="/event/1">Event 1</a></li>
                <li><a href="/event/2">Event 2</a></li>
                <li><a href="/event/3">Event 3</a></li>
                <li><a href="/event/4">Event 4</a></li>
                <li><a href="/event/5">Event 5</a></li>
            </ul>
        </section>
        <!-- Recent Comments -->
        <section class="box recent-comments">
            <header>
                <h2>Recent Comments</h2>
            </header>
            <ul>
                <li>case on <a href="#">Lorem ipsum dolor</a></li>
                <li>molly on <a href="#">Sed dolore magna</a></li>
                <li>case on <a href="#">Sed dolore magna</a></li>
            </ul>
        </section>
        <!-- Copyright -->
        <ul id="copyright">
            <li>&copy; Cattelan & Montes.</li>
            <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
        </ul>
    </div>

</div>
</body>
</html>