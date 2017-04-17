@extends('layout')

@section('title')
    <title>Club Admin Panel</title>


@stop

@section('body') 

@include('sidebar') 


	<div id="content">
	    <div class="inner">
	    	<h2><a href="/club/{{$club->id}}">{{ $club->name }}</a> Admin Panel</h2><br /><br />
	    	
	    	<h3>Events of the club</h3>
				<ul class="list-group">
					@foreach (App\Event::where('isAvailable', 1)->where('clubID', $club->id)->get() as $event)
						<form method="POST" action="/club/{{$club->id}}/admind">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="event" value="{{ $event->id }}">

		    			<li class="list-group-item"><a href="\event\{{$event->id}}">{{ $event->name }}</a> ( by : <a href="\user\{{App\User::where('id', $event->eventCreator)->first()->id}}">{{App\User::where('id', $event->eventCreator)->first()->name}} {{App\User::where('id', $event->eventCreator)->first()->surname}} )</a> - <strong>Short description :</strong> {{$event->short_descr}} - <a href="/event/{{$event->id}}#messages" class="icon fa-comment" style="color:grey">{{App\EventMessageBoard::where('eventID', $event->id)->count()}}</a> <a href="#" class="icon fa-heart" style="color:green">{{ $event->likes }}</a> <a href="#" class="icon fa-heartbeat" style="color:red">{{ $event->dislikes }}</a> <a href="/event/{{$event->id}}#members" class="icon fa-user-plus">{{ App\EventMembers::where('eventID', $event->id )->count() }}</a> - <button type="submit" name="deleteEvent" class="btn btn-danger" value="deleteEvent">Delete event</button></li>
		    			</form>
		    		@endforeach
		    	</ul>
		    	<hr />
		    	<h3>Club members</h3>
				<ul class="list-group"><br />
					@foreach (App\ClubMembers::where('clubID', $club->id)->get() as $clubMembers)<li class="list-group-item">
					<form method="POST" action="/club/{{$club->id}}/admind">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="memberID" value="{{ $clubMembers->id }}">
					<?php $user = App\User::where('id', $clubMembers->userID)->first(); ?>
						@if(App\ClubMembers::where('clubID', $club->id)->where('userID', $user->id)->first()->rank == 0)
						Member - <a href="/user/{{ $user->id }}">{{ $user->name }} {{ $user->surname }}</a> - <button type="submit" name="setAdmin" class="btn btn-success" value="setAdmin">Admin this user</button> <button type="submit" name="kickClub" class="btn btn-danger" value="kickClub">Kick this user out of the club</button>
						@elseif(App\ClubMembers::where('clubID', $club->id)->where('userID', $user->id)->first()->rank == 1)
						Admin - <a href="/user/{{ $user->id }}">{{ $user->name }} {{ $user->surname }}</a> - <button type="submit" name="unsetAdmin" class="btn btn-danger" value="unsetAdmin">Un-admin this user</button>
						@elseif(App\ClubMembers::where('clubID', $club->id)->where('userID', $user->id)->first()->rank == 2)
						Creator - <a href="/user/{{ $user->id }}">{{ $user->name }} {{ $user->surname }}</a> 
						@endif
						</li>
						</form>
		    		@endforeach
		    	</ul>
				<hr />
		    	<h3>Last Messages</h3>
				<ul class="list-group"><br />
					@foreach (App\Event::where('clubID', $club->id)->get() as $event)
						@foreach (App\EventMessageBoard::where('eventID', $event->id)->get() as $eventMessage)
						<form method="POST" action="/club/{{$club->id}}/admind">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="messageID" value="{{ $eventMessage->id }}">
							<li class="list-group-item"><p><strong><a href="/user/{{App\User::where('id', $eventMessage->userID)->first()->id}}">{{ App\User::where('id', $eventMessage->userID)->first()->name }} {{ App\User::where('id', $eventMessage->userID)->first()->surname }}</a></strong> said on <a href="/event/{{$event->id}}#message{{$eventMessage->id}}">{{ $event->name }}</a> ( {{$eventMessage->created_at}} ) - <button type="submit" name="deleteMessage" class="btn btn-danger" value="deleteMessage">Delete the message</button>
							<br/>{{ $eventMessage->message }}</p></li>
							</form>
			    		@endforeach
		    		@endforeach
		    	</ul>
    	</div>
	</div>

    

@stop
