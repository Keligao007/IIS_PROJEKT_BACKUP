@extends('layout.layout')

@section('title', 'LogIn')
@section('header', 'LogIn Používateľa')

@section('content')
<div class="login-page">
    <div class="login-container">
        <h2>Please log-in</h2>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <label for="login">Login:</label>
            <input type="text" name="login" id="login" placeholder="Username" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Password" required><br>

            <button type="submit" class="large-button">Log in</button>
        </form>
    </div>
</div>
@endsection