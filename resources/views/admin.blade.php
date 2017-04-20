@extends('layout')

@section('title')
    <title>Admin Panel</title>


@stop

@section('body') 

@include('sidebar') 


	<div id="content">
	    <div class="inner">
	    	<h2>Admin Panel</h2><br /><br />
	    	<h3>Awaiting clubs</h3>
			<ul class="list-group">
				@foreach (App\Club::where('isAvailable', 0)->get() as $club)
					<form method="POST" action="/admin/club">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="club" value="{{ $club->id }}">
		    			<li class="list-group-item"><a href="\club\{{$club->id}}">{{ $club->name }}</a> ( by : <a href="\user\{{App\User::where('id', $club->clubCreator)->first()->id}}">{{App\User::where('id', $club->clubCreator)->first()->name}} {{App\User::where('id', $club->clubCreator)->first()->surname}} )</a> - <strong>Short description :</strong> {{$club->short_descr}} - <button type="submit" name="upvote_admin" value="upvote_admin" class="btn btn-success">{{$club->upvote_admin}}</button> | <button type="submit" name="downvote_admin" value="downvote_admin" class="btn btn-danger">{{$club->downvote_admin}}</button> - <button type="submit" name="isAvailable" class="btn btn-success" value="1">Set available</button></li>
		    		</form>
	    		@endforeach
	    	</ul>
	    	<hr />
	    	<h3>Awaiting events</h3>
			<ul class="list-group">
				@foreach (App\Event::where('isAvailable', 0)->get() as $event)
				<form method="POST" action="/admin/event">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="event" value="{{ $event->id }}">
	    			<li class="list-group-item"><a href="\event\{{$event->id}}">{{ $event->name }}</a> ( by : <a href="\user\{{App\User::where('id', $event->eventCreator)->first()->id}}">{{App\User::where('id', $event->eventCreator)->first()->name}} {{App\User::where('id', $event->eventCreator)->first()->surname}} )</a> - <strong>Short description :</strong> {{$event->short_descr}} - <button type="submit" name="upvote_admin" value="upvote_admin" class="btn btn-success">{{$event->upvote_admin}}</button> | <button type="submit" name="downvote_admin" value="downvote_admin" class="btn btn-danger">{{$event->downvote_admin}}</button> - <button type="submit" name="isAvailable" class="btn btn-success" value="1">Set available</button></li>
	    		</form>
	    		@endforeach
	    	</ul>
	    	<hr />
	    	<h3>Active clubs</h3>
			<ul class="list-group">
				@foreach (App\Club::where('isAvailable', 1)->get() as $club)
				<form method="POST" action="/admin/club">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="club" value="{{ $club->id }}">
	    			<li class="list-group-item"><a href="\club\{{$club->id}}">{{ $club->name }}</a> ( by : <a href="\user\{{App\User::where('id', $club->clubCreator)->first()->id}}">{{App\User::where('id', $club->clubCreator)->first()->name}} {{App\User::where('id', $club->clubCreator)->first()->surname}} )</a> - <button type="submit" name="isAvailable" class="btn btn-danger" value="2">Set unavailable</button></li>
	    		</form>
	    		@endforeach
	    	</ul>
	    	<hr />
	    	<h3>Active events</h3>
			<ul class="list-group">
				@foreach (App\Event::where('isAvailable', 1)->get() as $event)
				<form method="POST" action="/admin/event">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="event" value="{{ $event->id }}">
	    			<li class="list-group-item"><a href="\event\{{$event->id}}">{{ $event->name }}</a> ( by : <a href="\user\{{App\User::where('id', $event->eventCreator)->first()->id}}">{{App\User::where('id', $event->eventCreator)->first()->name}} {{App\User::where('id', $event->eventCreator)->first()->surname}}</a> ) - <button type="submit" name="isAvailable" class="btn btn-danger" value="2">Set unavailable</button></li>
	    		</form>
	    		@endforeach
	    	</ul>
	    	<hr />
	    	<h3>Store stocks</h3>
	    	<ul class="list-group">
		    	@foreach (App\Item::get() as $goodie)
		    		<li class="list-group-item"><a href="\store\{{$goodie->id}}">{{ $goodie->name }}</a> - ${{$goodie->price}} - Current stock : <button class="btn btn-success" value="2">{{$goodie->stock}}</button>
		    		<br /><br />
		    		<form method="post" class="form-inline" action="/admin/stock">
		    			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		    			<input type="hidden" name="_stockID" value="{{ $goodie->id }}">
						<input type="number" name="value" class="form-control" >
		    			<button type="submit" class="btn btn-primary" >Add stock</button>
		    		</form>
		    			</li>
		    	@endforeach
			</ul>
	    </div>
	</div>

    

@stop
