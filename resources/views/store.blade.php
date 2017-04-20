<!DOCTYPE HTML>
<html>

<head>
    <title>Store</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/main.css" /> 
    <link rel="stylesheet" href="assets/css/mainStore.css" /> 
    
    
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
								<h1>Welcome to the store !</h1>
								<p>Voici tout les goodies que nous avons en rayon !</p>

<!-- 
								 @foreach ($store as $item)
								 
									<div >{{$item->name}} </div>
									<h6><a href="/store/{{ $item->id }}">{{ $item->name }}</a></h6>
									
								 @endforeach -->
							</header>
							<section class="tiles">
								@foreach ($store as $item)
								 
								<?php $img = rand(1, 6); ?>
									
								<article class="style1">
									<span class="image">
										<img src="images/store_indexComp{{$item->pictureID}}.jpg" alt="" />
									</span>
									<a href="/store/{{ $item->id }}">
										<h6>{{$item->name}}</h6>
										<div class="content">
											<p>{{$item->description, 50}}</p>
										</div>
									</a>
								</article>
								@endforeach
							</section>
							
						</div>
					</div>

@include('sidebar')

</body>
</html>