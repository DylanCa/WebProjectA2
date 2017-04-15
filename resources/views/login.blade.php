@extends('layout')

@section('title')
    <title>Login</title>
@stop

@section('body') 

  
    <section id="form">
    <div class="container">
    <h3>Login:</h3>
        <form method="post" action="/login">
            <div class="row">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-sm-6">
                    <div class="form-group">
                        <!-- <label for="nom">Nom:</label> -->
                        <input type="email" name="email" class="form-control" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <!-- <label for="email">Email:</label> -->
                        <input type="password" name="password" class="form-control" required>
                    </div>
                </div>
            </div>
        </div> 
        <button type='submit' class="btn btn-primary">SUBMIT</button>
    </form>
    <form method="get" action="create">
        <button class="btn btn-default">Create an account</button>
    </form>

</section>
<!-- 
<div class="container">
    <div class="form-group">
        <form method="post" action="/login">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="email" name="email" class="form-control" required>
            <input type="password" name="password" class="form-control" required>
            <button type='submit' class="btn btn-primary">SUBMIT</button>
        </form>
        <form method="get" action="create">
            <button class="btn btn-primary">Create an account</button>
        </form>
    </div>
</div>
 --> 

@stop
   

