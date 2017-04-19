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
    <link rel="icon" href="/images/tab_icon.jpg" sizes="16x16">
</head>

<body>
	<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner2">
							<header>
								<h1>{{$item->name}}</h1>
								<img src="/images/store{{$item->pictureID}}.jpg" alt="" />
								<p>{{$item->price}}€</p>
								<p>{{$item->description}}</p>

							</header>
							
						</div>
					</div>
			</div>



@include('sidebar');


</body>
</html>