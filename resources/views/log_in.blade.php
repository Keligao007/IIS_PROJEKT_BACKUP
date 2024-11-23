@extends('layout.layout')

@section('title', 'LogIn')
@section('header', 'LogIn Používateľa')

@section('content')

    <div>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <label for="login">Login</label>
            <input type="text" name="login" id="login"><br>

            <label for="password">Password</label>
            <input type="password" name="password" id="password"><br>

            <input type="submit" value="Log in">
        </form>
    </div>
    
    <!-- <p><a href="{{ url('/') }}">Back</a></p> -->

@endsection
