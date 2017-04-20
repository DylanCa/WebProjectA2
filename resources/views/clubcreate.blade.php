@extends('layout') @section('title')
<title>Create Club</title>
@stop @section('body')
<section id="form">
    <div class="container">
        <h3>Create a Club:</h3>
        <form method="post" action="/create/club">
            <div class="row">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Club Name" required>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="form-group">
                        <input type="text" name="short_descr" class="form-control" placeholder="Short Description of the club" required>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group">
                        <textarea name="long_descr" class="form-control" placeholder="Long Description of the club" required></textarea>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="form-group">
                        <label for="clubimage">Club image URL<br/>( format .jpg / jpeg / .png / .gif )</label>
                        <input type="text" class="form-control" name="clubimage" pattern=".*\.jpg$|.*\.jpeg$|.*\.png$|.*\.gif$" placeholder="https://image.jpeg">
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="form-group">
                        Budget
                        <input type="number"  min=1 class="form-control" name="budget">
                    </div>
                </div>
            </div>
            <button type='submit' class="btn btn-primary col-sm-2">SUBMIT</button>
        </form>
    </div>
</section>
@stop
