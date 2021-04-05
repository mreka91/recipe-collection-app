@extends('layout')
@section('content')
    <form action="login" method="post">
        @csrf
        <label for="email">Email</label>
        <input type="email" id="email" name="email">
        <label for="password">Password</label>
        <input name="password" id="password" type="password" />
        <button type="submit">Login</button>
    </form>
@include('errors')
@if(Route::has('signup'))
    <a href="signup">Click here to signup</a>
@endif
@endsection
