@extends('layout') @section('title')
<?php $user = App\User::where('id', $id )->first(); ?>
<title>{{ $user->name }} {{ $user->surname }}'s profile</title>
@stop @section('body')

<div id="content">
	<div id="profil" class="inner">
	    <div id="img" class="col-lg-5">
	    	<img width="310" height="310" src="{{ $user->avatar }}"  class="img-thumbnail img-responsive">
	    	@if($user->id == \Cookie::get('id'))
				<form method="POST" action="\profile">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				  	<div class="form-group col-lg-10 text-center">
				    	<label for="avatar">Change your avatar<br/>( format .jpg / jpeg / .png / .gif )</label>
				    	<input type="text" class="form-control" name="avatar" pattern=".*\.jpg$|.*\.jpeg$|.*\.png$|.*\.gif$" placeholder="https://image.jpeg">
				    	<button type="submit" name="changeavatar" value="changeavatar" class="btn btn-primary" >Change it !</button>
				  	</div>
				</form>
	    	@endif
	    </div>
	    <div class="form-group">
	        <label class="col-lg-5 control-label text-center" style="border: 1px solid black; border-radius: 6px;">
	            <h3>{{ $user->name }} {{ $user->surname }} <small>{{ $user->email }}</h3>
	            <h4>{{ $user->schoolLocation }}</small></h4><i><h5>{{ $user->catchPhrase }}</i></h5>
	        </label>
	    </div>
    </div>

    <div id="events" class="inner">
	    <ul class="list-group col-lg-5 text-center"><label>Events {{App\User::where('id', $id)->first()->name}} is going to</label>
	    @foreach (\App\EventMembers::where('userID', $id)->get() as $event)
	    	@if(\App\ClubMembers::where('clubID', \App\Event::where('id', $event->eventID)->where('isAvailable', 1)->first()->clubID)->where('userID', \Cookie::get('id'))->count() == 1 || \App\Event::where('id', $event->eventID)->first()->clubID == 0 )
	    	<li class="list-group-item"><a href="\event\{{$event->eventID}}">{{ \App\Event::where('id', $event->eventID)->where('isAvailable', 1)->first()->name }}</a></li>
	    	@endif
	    @endforeach
    </div>
</div>

@include('sidebar') @stop
