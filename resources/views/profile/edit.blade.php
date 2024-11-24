@extends('layout.layout')

@section('title', 'Edit')
@section('header', 'Edit')

@section('content')
<div class="container">
    <h1>Upraviť profil {{ $user->login }}</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('updateProfile') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="label">Meno</label>
            <input type="text" name="login" id="login" class="form-control" value="{{ old('login', $user->login) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Uložiť</button>
    </form>
</div>
@endsection