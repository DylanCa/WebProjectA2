@extends('layout') @section('title')
<title>{{ $event->name }}</title>
@stop @section('body')
<div id="content">
    <div class="inner">
        <article class="box post post-excerpt">
            <header>
                <h2><a href="/event/{{ $event->id }}">{{ $event->name }}</a><small> ( by <a href="/user/{{ $event->eventCreator }}">{{ App\User::where('id', $event->eventCreator)->first()->name}} {{ App\User::where('id', $event->eventCreator)->first()->surname}}</a> ) 
                    @if($event->clubID !=0 )
                        - <a href="\club\{{$event->clubID}}">{{App\Club::where('id', $event->clubID)->first()->name}} </a>
                    @endif </small></h2>
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
            <a href="/event/{{$event->id}}" class="image featured"><img style="max-width:500px; height:auto" src="{{ $event->eventimage }}" alt="" /></a>
            <p>{{ $event->long_descr }}</p>
            <br/>
            <div class="inner">
                <form action="/event/{{$event->id}}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="event" value="{{ $event->id }}">
                    <input type="hidden" name="user" value="{{ \Cookie::get('id') }}">
                    <button type="submit" name="like" class="btn btn-primary" value="like">Good Idea !</button>
                    <button type="submit" name="dislike" class="btn btn-warning" value="dislike">Meh .. Not that good.</button> 
                    @if(App\EventMembers::where('userID', \Cookie::get('id'))->where('eventID', $event->id)->count() == 0)
                        <button type="submit" name="join" class="btn btn-success" value="join">Join the event</button>
                    @else
                        <button type="submit" name="leave" class="btn btn-danger" value="leave">Leave the event</button>
                    @endif
                    
                </form>
            </div>
            <hr />
            <div id="messages">
                <form action="/event/{{$event->id}}/admin" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <ul class="list-group">
                        @foreach ( App\EventMessageBoard::where('eventID', $event->id)->get() as $message)
                        <li class="list-group-item"><p><strong><a href="/user/{{App\User::where('id', $message->userID)->first()->id}}">{{ App\User::where('id', $message->userID)->first()->name }} {{ App\User::where('id', $message->userID)->first()->surname }}</a></strong> said on <a href="/event/{{$event->id}}#message{{$message->id}}">{{ $event->name }}</a> ( {{$message->created_at}} ) @if(!(empty(App\EventMembers::where('userID', \Cookie::get('id'))->where('eventID', $event->id)->first())) && App\EventMembers::where('userID', \Cookie::get('id'))->where('eventID', $event->id)->first()->isAdmin != 0 ) 
                            - <button type="submit" name="deleteMessage" class="btn btn-danger" value="{{$message->id}}">Delete the message</button>
                        @endif
                    <br/>{{ $message->message }}</p></li>
                        @endforeach
                    </ul>
                </form>
            </div>
            <form action="/event/{{$event->id}}" method="post">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="event" value="{{ $event->id }}">
                <input type="hidden" name="user" value="{{ \Cookie::get('id') }}">
                <textarea name="message" cols="30" rows="10" placeholder="Placeholder"></textarea>
                <button type="submit" name="sendmessage" class="btn btn-primary" value="sendmessage">Send message</button>
            </form>
            
            <hr />

            <div id="members">
                List of atendees 
                <ul class="list-group"> 

                    @foreach ( App\EventMembers::where('eventID', $event->id)->get() as $member)
                    
                    <form action="/event/{{$event->id}}/admin" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="memberID" value="{{$member->id}}">
                    <input type="hidden" name="eventID" value="{{ $member->eventID }}">
                        <li class="list-group-item">
                            <?php 
                                $user = App\User::where('id', $member->userID)->first();
                                if(!empty(App\EventMembers::where('userID', \Cookie::get('id'))->first())){
                                    $eventMember = App\EventMembers::where('userID', \Cookie::get('id'))->first();
                                } else { 
                                    $eventMember = new App\EventMembers;
                                    $eventMember->isAdmin = 0;
                                } 
                                ?> 

                            @if($member->isAdmin == 0) 
                                Member - <a href="/user/{{ $user->id }}">{{ $user->name }} {{ $user->surname }}</a> - 
                                @if($eventMember->isAdmin == 1 || $eventMember->isAdmin == 2 )
                                    <button type="submit" name="kickEvent" class="btn btn-success" value="kickEvent">Kick this user</button>
                                @endif 
                                @if ($eventMember->isAdmin == 2)
                                    <button type="submit" name="setAdmin" class="btn btn-success" value="setAdmin">Admin this user</button>
                                @endif 
                            @elseif($member->isAdmin == 1) 
                                Admin - <a href="/user/{{ $user->id }}">{{ $user->name }} {{ $user->surname }}</a> - 
                                @if ($eventMember->isAdmin == 2)
                                    <button type="submit" name="unsetAdmin" class="btn btn-danger" value="unsetAdmin">Un-admin this user</button>
                                @endif 
                            @elseif($member->isAdmin == 2) 
                                Creator - <a href="/user/{{ $user->id }}">{{ $user->name }} {{ $user->surname }}</a> 
                            @endif </li>
                    </form>
                    @endforeach
                </ul>
            </div>
        </article>
    </div>
</div>
@include('sidebar') @stop
