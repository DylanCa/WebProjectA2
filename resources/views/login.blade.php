@extends('layout')
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
