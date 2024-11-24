@extends('layout.moderator_layout')

@section('title', 'Moderator')
@section('header', 'Moderator')

@section('content')
<div class="moderator-page">
    <div class="moderator-container">
        <a href="{{ route('moderator_kategorie') }}" class="styled-button">
            Spravovať kategórie
        </a>

        <br />
        <br />
        <br />

        <a href="{{ route('moderator_navrhy') }}" class="styled-button">
            Návrhy uživateľov
        </a>
    </div>
</div>
@endsection