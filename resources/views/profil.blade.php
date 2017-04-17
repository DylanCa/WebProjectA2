@extends('layout') @section('title')
<title>Profil</title>
@stop @section('body')
<div id="content">
    <form method="POST" action="/profil" class="form-horizontal">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
                <input type="text" name="name" value="{{ App\User::where('id', \Cookie::get('id') )->first()->name }}" required />
            </div>
            <label for="surname" class="col-sm-2 control-label">Surname</label>
            <div class="col-sm-10">
                <input type="text" name="surname" value="{{ App\User::where('id', \Cookie::get('id') )->first()->surname }}" class="form-control" required />
            </div>
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <input type="email" name="email" pattern="[A-z.]*[@]viacesi\.fr|[A-z.]*[@]cesi\.fr" value="{{ App\User::where('id', \Cookie::get('id') )->first()->email }}" class="form-control" required />
            </div>
            <label for="catchphrase" class="col-sm-2 control-label">Catchphrase</label>
            <div class="col-sm-10">
                <input type="text" name="catchphrase" value="{{ App\User::where('id', \Cookie::get('id') )->first()->catchphrase }}" class="form-control" />
            </div>
            <div class="col-sm-offset-2 col-sm-10">
            <br />
                <button type="submit" class="btn btn-primary">Update profil</button>
            </div>
        </div>
    </form>
</div>
@include('sidebar') @stop
