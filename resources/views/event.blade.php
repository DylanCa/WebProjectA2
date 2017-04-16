@extends('layout')

@section('title')
<title>Event</title>
    <link rel="stylesheet" href="assets/css/main.css" />
@stop

@section('body') 



        @foreach( $event = App\Event::get() as $event)
             
<!-- Content -->
<div id="content">
	<div class="inner">

		<!-- Post -->
		<article class="box post post-excerpt">
			<header>
                <!--
                    Note: Titles and subtitles will wrap automatically when necessary, so don't worry
                    if they get too long. You can also remove the <p> entirely if you don't
                    need a subtitle.
                -->
                <h2><a href="#">{{ $event->name }}</a></h2>
                <p>{{ $event->short_descr }}</p>
            </header>
            <div class="info">
                <!--
                    Note: The date should be formatted exactly as it's shown below. In particular, the
                    "least significant" characters of the month should be encapsulated in a <span>
                    element to denote what gets dropped in 1200px mode (eg. the "uary" in "January").
                    Oh, and if you don't need a date for a particular page or post you can simply delete
                    the entire "date" element.
                -->
                <span class="date"><span class="month">Jul<span>y</span></span> <span class="day">14</span><span class="year">, 2014</span></span>
                <!--
                    Note: You can change the number of list items in "stats" to whatever you want.
                -->
                <ul class="stats">
                	<li><a href="#" class="icon fa-comment">0</a></li>
                	<li><a href="#" class="icon fa-heart">0</a></li>
                </ul>
            </div>
            <a href="#" class="image featured"><img src="images/pic01.jpg" alt="" /></a>
            <p>{{ $event->long_descr }}
            </p>
        </article>

        <!-- Post -->
        <article class="box post post-excerpt">
        	<header>
        		<h2><a href="#">Event 2</a></h2>
        		<p>Feugiat interdum sed commodo ipsum consequat dolor nullam metus</p>
        	</header>
        	<div class="info">
        		<span class="date"><span class="month">Jul<span>y</span></span> <span class="day">8</span><span class="year">, 2014</span></span>
        		<ul class="stats">
        			<li><a href="#" class="icon fa-comment">0</a></li>
        			<li><a href="#" class="icon fa-heart">0</a></li>
        			<li><a href="#" class="icon fa-twitter">0</a></li>
        			<li><a href="#" class="icon fa-facebook">0</a></li>
        		</ul>
        	</div>
        	<a href="#" class="image featured"><img src="images/pic02.jpg" alt="" /></a>
        	<p>
        		Quisque vel sapien sit amet tellus elementum ultricies. Nunc vel orci turpis. Donec id malesuada metus.
        		Nunc nulla velit, fermentum quis interdum quis, tate etiam commodo lorem ipsum dolor sit amet dolore.
        		Quisque vel sapien sit amet tellus elementum ultricies. Nunc vel orci turpis. Donec id malesuada metus.
        		Nunc nulla velit, fermentum quis interdum quis, convallis eu sapien. Integer sed ipsum ante.
        	</p>
        </article>

        <!-- Pagination -->
        <div class="pagination">
        	<!--<a href="#" class="button previous">Previous Page</a>-->
        	<div class="pages">
        		<a href="#" class="active">1</a>
        		<a href="#">2</a>
        		<a href="#">3</a>
        		<a href="#">4</a>
        		<span>&hellip;</span>
        		<a href="#">20</a>
        	</div>
        	<a href="#" class="button next">Next Page</a>
        </div>

    </div>
</div>

@endforeach
@include('sidebar') 

@stop
