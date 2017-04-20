@extends('layout') 

@section('title')
    <title>Clubs</title>
    <link rel="stylesheet" href="/assets/css/main.css" /> 
@stop 

@section('body')
<!-- Content -->
<div id="content">
    <div class="inner">
    <form method='post' action='/club/new/'>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <button type="submit" class="btn btn-primary">Create a club</button>
    </form>
        @foreach( App\Club::where('isAvailable', 1)->orderBy('created_at', 'DESC')->get() as $club)
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
                    <li><a href="/club/{{$club->id}}#members" class="icon fa-user-plus">{{ App\ClubMembers::where('clubID', $club->id )->count() }}</a></li>
                </ul>
            </div>
            <a href="/club/{{$club->id}}" class="image featured"><img style="max-width:500px; height:auto" src="{{ $club->clubimage }}" alt="" /></a>
            <p>{{ $club->long_descr }}
            </p>
        </article>
        @endforeach
        <!-- Pagination -->
        
    </div>
</div>
@include('sidebar') 
@stop
