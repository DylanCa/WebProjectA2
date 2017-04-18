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
									
								<article class="style{{$img}}">
									<span class="image">
										<img src="images/{{$img}}.jpg" alt="" />
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

<div id="sidebar">
    <!-- Logo -->
    <h1 id="logo"><a href="/">BDE EXIA</a></h1>
    <!-- Text -->
    <section class="box text-style1">
        <div class="inner">
            @if(!empty(\Cookie::get('id')))
            <p>
                <a href='/profil'>{{ App\User::where('id', \Cookie::get('id') )->first()->name }} {{ App\User::where('id', \Cookie::get('id') )->first()->surname}}</a>
                <br/> <a href='/logout'>Logout</a>
            </p>
            @else
            <p>
                <a href='/login'>Login</a><br/>
                <a href='/register'>Create an account</a>
            </p>
            @endif
        </div>
    </section>
    <!-- Nav -->
    <nav id="nav">
        <ul>
            <li class="current"><a href="/">Homepage</a></li>
            <li><a href="/club">Clubs</a></li>
            <li><a href="/event">Events</a></li>
            <li><a href="/store">Store</a></li>
            @if(App\User::where('id', \Cookie::get('id'))->first()->isAdmin == 1)
                <li><a href="/admin">Admin Panel</a></li>
            @endif
        </ul>
    </nav>
    <!-- Recent Posts -->
    <section class="box recent-posts">
        <header >
            <h4>Your upcoming events</h4>
        </header>
        <ul>
        @foreach (App\EventMembers::where('userID', \Cookie::get('id'))->get() as $eventMember)
            @if(App\Event::where('id', $eventMember->eventID)->first()->isAvailable == 1)
                @if(App\ClubMembers::where('userID', \Cookie::get('id'))->where('clubID', (App\Event::where('id', $eventMember->eventID)->first()->clubID))->count() != 0 || App\Event::where('id', $eventMember->eventID)->first()->clubID == 0)
                    <li><a href="/event/{{$eventMember->eventID}}">{{App\Event::where('id', $eventMember->eventID)->first()->eventDate}} - {{ App\Event::where('id', $eventMember->eventID)->first()->name }}</a></li>
                @endif
            @endif
        @endforeach
        </ul>
    </section>

    <section class="box recent-posts">
        <header>
            <h4>Your clubs</h4>
        </header>
        <ul>
        @foreach (App\ClubMembers::where('userID', \Cookie::get('id'))->get() as $club)
            @if(App\Club::where('id', $club->clubID)->first()->isAvailable == 1)
                <li><a href="/club/{{$club->clubID}}">{{ App\Club::where('id', $club->clubID)->first()->name }}</a></li>
            @endif
        @endforeach
        </ul>
    </section>
    <!-- Recent Comments -->
    <section class="box recent-comments">
        <header>
            <h4>Recent Comments</h4>
        </header>
        <ul>
        @foreach (App\EventMessageBoard::all()->take(5) as $message)
            @if(App\Event::where('id', $message->eventID)->first()->isAvailable == 1 && !empty(App\EventMembers::where('userID', \Cookie::get('id'))->where('eventID', $message->eventID)->first()))
                <li><a href="/user/{{$message->userID}}">{{App\User::where('id',$message->userID)->first()->name}} {{App\User::where('id',$message->userID)->first()->surname}} </a> on <a href="/event/{{$message->eventID}}">{{App\Event::where('id', $message->eventID)->first()->name}}</a><br /><a href="/event/{{$message->eventID}}#comments">{{str_limit($message->message, 50)}}</a></li>
            @endif
        @endforeach
        </ul>
    </section>
    <!-- Copyright -->
    <ul id="copyright">
        <li>&copy; Cattelan & Montes.</li>
        <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
    </ul>
</div>

</body>
</html>