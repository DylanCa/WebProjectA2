@extends('layout')

@section('body')

<div id="content">
	<form method="post" action="bde/signup">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<button type="submit" name="signbde" value="signbde" class="btn btn-primary">S'inscrire au BDE</button>
		<br /> <br />

		<ul class="list-group"> List of BDE candidates :
		@foreach (App\Bde::get() as $BDEmember)
			@if (App\User::where('id', $BDEmember->userID)->first()->isBDE == 0)
					<input type="hidden" name="_id" value="{{ $BDEmember->id }}">
					<li class="list-group-item"> <a href="\user\{{$BDEmember->userID}}">{{App\User::where('id', $BDEmember->userID)->first()->name}} {{App\User::where('id', $BDEmember->userID)->first()->surname}}</a> <button type="submit" name="upvote" value="upvote" class="btn btn-success">{{$BDEmember->upvote}}</button> | <button type="submit" name="downvote" value="downvote" class="btn btn-danger">{{$BDEmember->downvote}}</button>
					@if(App\User::where('id', \Cookie::get('id'))->first()->isAdmin == 1)
						 - <button type="submit" name="setmember" class="btn btn-success" value="setmember">Set BDE member</button>
					@endif
					</li>
			@endif
		@endforeach
		</ul>
		<hr />
		<ul class="list-group"> Current BDE Members :
		@foreach (App\User::where('isBDE', 1)->get() as $BDEmember)
			
			<input type="hidden" name="_id" value="{{ $BDEmember->id }}">
			<li class="list-group-item"> <a href="\user\{{$BDEmember->id}}">{{App\User::where('id', $BDEmember->id)->first()->name}} {{App\User::where('id', $BDEmember->id)->first()->surname}}</a>
			@if(App\User::where('id', \Cookie::get('id'))->first()->isAdmin == 1)
				 - <button type="submit" name="unsetmember" class="btn btn-danger" value="unsetmember">Unset BDE member</button>
			@endif
			</li>
		
		@endforeach
		</ul>
	</form>
</div>

@include('sidebar')
@stop