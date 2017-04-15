@extends('layout')

@section('title')
    <title>Profil</title>
@stop

@section('body') 
	<span class="form-control">{{ App\User::where('id', \Cookie::get('id') )->first()->name }} <- NAME </span>
	<span class="form-control">{{ App\User::where('id', \Cookie::get('id') )->first()->surname }} <- SURNAME</span>
	<span class="form-control">{{ App\User::where('id', \Cookie::get('id') )->first()->email }} <- EMAIL</span>
	<span class="form-control">{{ App\User::where('id', \Cookie::get('id') )->first()->catchPhrase }} <- CATCH PHRASE</span>
	<span class="form-control"> <- ECOLE</span>
	<span class="form-control">{{ App\User::where('id', \Cookie::get('id') )->first()->avatar }} <- AVATAR</span>
   
@stop
