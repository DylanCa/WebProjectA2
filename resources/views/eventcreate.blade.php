@extends('layout') @section('title')
<title>Create Event</title>
@stop @section('body')
<section id="form">
    <div class="container">
        <h3>Create an event:</h3>
        <form method="post" action="/create/event">
            <div class="row">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Event Name" required>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="form-group">
                        <input type="text" name="short_descr" class="form-control" placeholder="Short Description of the event" required>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="form-group">
                        <input type="file" name="eventImage" />
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group">
                        <textarea name="long_descr" class="form-control" placeholder="Long Description of the event" required></textarea>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="form-group">
                        When do you want it to happen ?
                        <input type="date" min="{{ date('Y-m-d') }}" class="form-control" name="eventDate">
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="form-group">
                        Is your event for a specific club ?
                        <select name="clubID" class="form-control">
                            <option value="0">No</option>
                            @foreach (App\ClubMembers::where('userID', \Cookie::get('id'))->get() as $club)
                                {{-- expr --}}
                            
                            <option value="{{ $club->clubID }}">{{ App\Club::where('id', $club->clubID)->first()->name }}</option>

                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <button type='submit' class="btn btn-primary col-sm-2">SUBMIT</button>
        </form>
    </div>
    </div>
</section>
@stop
