@extends('layout.layout')

@section('title', 'Registrácia')
@section('header', 'Registrácia Používateľa')

@section('content')

    <div>
        <form action="{{ route('register') }}" method="post">
            @csrf
            <label for="login">Login</label>
            <input type="text" name="login" id="login"><br>

            <label for="password">Password</label>
            <input type="password" name="password" id="password"><br>

            <input type="submit" value="register">
        </form>
    </div>

    <!-- s<p><a href="{{ url('/') }}">Back</a></p> -->

@endsection


