@extends('layout.layout')

@section('title', 'Registrácia')
@section('header', 'Registrácia Používateľa')

@section('content')

    <div class="login-page">
        <div class="login-container">
            <h2>Registrácia</h2> 
            <form action="{{ route('register') }}" method="post">
                @csrf
                <label for="login">Register Login:</label>
                <input type="text" name="login" id="login"><br>

                <label for="password">Register Password:</label>
                <input type="password" name="password" id="password"><br>

                <button type="submit" class="large-button">Register</button>
            </form>
        </div>
    </div>

    <!-- s<p><a href="{{ url('/') }}">Back</a></p> -->

@endsection