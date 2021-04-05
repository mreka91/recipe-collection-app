@extends('layout')
@section('content')
    <form action="signup" method="post">
        @csrf
        <label for="username">Username</label>
        <input type="text" id="username" name="username">
        <label for="email">Email</label>
        <input type="email" id="email" name="email">
        <label for="password">Password</label>
        <input name="password" id="password" type="password" />
        <label for="password">Confirm password</label>
        <input name="password_confirmation" id="password_confirmation" type="password" />
        <button type="submit">Sign up</button>
    </form>
@include('errors')
@if(Route::has('login'))
    <a href="login">Click here to login</a>
@endif
@endsection
