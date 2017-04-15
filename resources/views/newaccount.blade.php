@extends('layout')
<div class="container">
    <div class="form-group">
        <form method="post" action="/register">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="text" name="name" class="form-control" required>
            <input type="text" name="surname" class="form-control" required>
            <input type="email" name="email" class="form-control" required>
            <input type="password" name="password" class="form-control" required>
            <button type='submit' class="btn btn-primary">SUBMIT</button>
        </form>
    </div>
</div>
