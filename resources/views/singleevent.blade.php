@extends('layout') 
@section('title')
    <title>{{ $event->name }}</title>
@stop
@section('body')
    <div id="content">
        <div class="inner">
            <article class="box post post-excerpt">
                <header>
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
                        <li><a href="/event/{{$event->id}}#messages" class="icon fa-comment">{{App\EventMessageBoard::where('eventID', $event->id)->count()}}</a></li>
                        <li><a href="#" class="icon fa-heart">{{ $event->likes }}</a></li>
                        <li><a href="#" class="icon fa-heartbeat">{{ $event->dislikes }}</a></li>
                        <li><a href="/event/{{$event->id}}#members" class="icon fa-user-plus">{{ App\EventMembers::where('eventID', $event->id )->count() }}</a></li>
                    </ul>
                </div>
                <a href="#" class="image featured"><img src="/images/pic01.jpg" alt="" /></a>
                <p>{{ $event->long_descr }}</p>
                <br/>
                <form action="/event/{{$event->id}}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="event" value="{{ $event->id }}">
                    <input type="hidden" name="user" value="{{ \Cookie::get('id') }}">
                    <button type="submit" name="like" class="btn btn-primary" value="like">Good Idea !</button>
                    <button type="submit" name="dislike" class="btn btn-primary" value="dislike">Meh .. Not that good.</button> @if(App\EventMembers::where('userID', \Cookie::get('id'))->where('eventID', $event->id)->count() == 0)
                    <button type="submit" name="join" class="btn btn-primary" value="join">Join the event</button>
                 @else  
                    <button type="submit" name="leave" class="btn btn-primary" value="leave">Leave the event</button>
                 @endif
                    <hr /> 

                    <div id="messages">
                        @foreach ( App\EventMessageBoard::where('eventID', $event->id)->get() as $message)
                            <p><strong>{{ App\User::where('id', $message->userID)->first()->name }} {{ App\User::where('id', $message->userID)->first()->surname }}</strong> said ( {{$message->created_at}} ) :
                            <br/>{{ $message->message }}</p>
                            <br /> 
                        @endforeach
                    </div>
                    <textarea name="message" cols="30" rows="10" placeholder="Placeholder"></textarea>
                    <button type="submit" name="sendmessage" class="btn btn-primary" value="sendmessage">Send message</button>
                </form>
                <div id="members">
                    <ul id="comments" class="list-group"> List of atendees : @foreach ( App\EventMembers::where('eventID', $event->id)->get() as $member)
                        <a href="/user/{{App\User::where('id', $member->userID)->first()->id}}" class="list-group-item">{{ App\User::where('id', $member->userID)->first()->name}} {{App\User::where('id', $member->userID)->first()->surname}}</a> 
                    @endforeach
                    </ul>
                </div>
            </article>
        </div>
    </div>
    @include('sidebar')
@stop
