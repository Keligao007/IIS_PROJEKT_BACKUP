@extends('layout.user_layout')

@section('title', 'Edit')
@section('header', 'Edit Profil')

@section('content')
<div class="login-page" style="margin-top: 20px; margin-bottom: 20px;">
    <div class="login-container">
        <h2>Upraviť profil {{ $user->login }}</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('updateProfile') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="old_login">Pôvodné meno:</label>
                <input type="text" id="old_login" class="form-control" value="{{ $user->login }}" disabled>
            </div>
            <div class="form-group">
                <label for="login">Meno:</label>
                <input type="text" name="login" id="login" class="form-control" placeholder="Username" value="{{ old('login', $user->login) }}" required>
            </div>
            <button type="submit" class="large-button">Uložiť</button>
        </form>
    </div>
</div>
@endsection