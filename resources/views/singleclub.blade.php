@extends('layout') @section('title')
<title>{{ $club->name }}</title>
<link rel="stylesheet" href="/assets/css/main.css" /> @stop @section('body')
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
                <h2><a href="/club/{{ $club->id }}">{{ $club->name }}</a></h2>
                <p>{{ $club->short_descr }}</p>
            </header>
            <div class="info">
                <ul class="stats">
                    <li><a href="#" class="icon fa-user-plus">{{ App\ClubMembers::where('clubID', $club->id )->count() }}</a></li>
                </ul>
            </div>
            <a href="#" class="image featured"><img src="/images/pic01.jpg" alt="" /></a>
            <p>{{ $club->long_descr }}</p>
            <br/>
            <form action="/club/{{$club->id}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="club" value="{{ $club->id }}">
                <input type="hidden" name="user" value="{{ \Cookie::get('id') }}">
                @if(App\clubMembers::where('userID', \Cookie::get('id'))->where('clubID', $club->id)->count() == 0)
                    <input type="submit" name="join" class="btn btn-primary" value="Join the club" />
                 @else  
                    <input type="submit" name="leave" class="btn btn-primary" value="Leave the club" /> 
                 @endif
            <hr />

            @foreach( App\Event::where('isAvailable', 1)->where('clubID', $club->id)->orderBy('created_at', 'DESC')->get() as $event)
        <!-- Post -->
        <article class="box post post-excerpt">
            <header>
                <!--
                    Note: Titles and subtitles will wrap automatically when necessary, so don't worry
                    if they get too long. You can also remove the <p> entirely if you don't
                    need a subtitle.
                -->
                <h2><a href="/event/{{ $event->id }}">{{ $event->name }}</a></h2>
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
                <span class="date"><span class="month">Jul<span>y</span></span> <span class="day">14</span><span class="year">, {{ $event->eventDate }}</span></span>
                <!--
                    Note: You can change the number of list items in "stats" to whatever you want.
                -->
                <ul class="stats">
                    <li><a href="#" class="icon fa-comment">{{App\EventMessageBoard::where('eventID', $event->id)->count()}}</a></li>
                    <li><a href="#" class="icon fa-heart">{{ $event->likes }}</a></li>
                    <li><a href="#" class="icon fa-heartbeat">{{ $event->dislikes }}</a></li>
                    <li><a href="#" class="icon fa-user-plus">{{ App\EventMembers::where('eventID', $event->id )->count() }}</a></li>
                </ul>
            </div>
            <a href="#" class="image featured"><img src="images/pic01.jpg" alt="" /></a>
            <p>{{ $event->long_descr }}
            </p>
        </article>
        @endforeach
           
        </article>
    </div>
</div>
@include('sidebar') @stop
