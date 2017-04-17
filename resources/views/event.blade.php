@extends('layout') 

@section('title')
    <title>Event</title>
    <link rel="stylesheet" href="/assets/css/main.css" /> 
@stop 

@section('body')
<!-- Content -->
<div id="content">
    <div class="inner">
    <form method='post' action='event/new/'>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-primary">Create an event</button>
    </form>
        @foreach( App\Event::where('isAvailable', 1)->orderBy('created_at', 'DESC')->get() as $event)
            @if (App\ClubMembers::where('clubID', $event->clubID)->where('userID', \Cookie::get('id'))->count() != 0 || $event->clubID == 0)
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
                        <span class="date"><span class="month">{{ $event->eventDate }}<span></span></span> <!-- <span class="day">{{ $event->eventDate }}</span> --><span class="year">, {{ $event->eventDate }}</span></span>
                        <!--
                            Note: You can change the number of list items in "stats" to whatever you want.
                        -->
                        <ul class="stats">
                            <li><a href="/event/{{$event->id}}#messages" class="icon fa-comment">{{App\EventMessageBoard::where('eventID', $event->id)->count()}}</a></li>
                            <li><a href="#" class="icon fa-heart">{{ $event->likes }}</a></li>
                            <li><a href="#" class="icon fa-heartbeat">{{ $event->dislikes }}</a></li>
                            <li><a href="/event/{{$event->id}}#members" class="icon fa-user-plus">{{ App\EventMembers::where('eventID', $event->id )->count() }}</a></li>
                        </ul>
                    </div>
                    <a href="#" class="image featured"><img src="images/pic01.jpg" alt="" /></a>
                    <p>{{ $event->long_descr }}
                    </p>
                </article>
            @endif
        @endforeach
        <!-- Pagination -->
        
    </div>
</div>
@include('sidebar') 
@stop
