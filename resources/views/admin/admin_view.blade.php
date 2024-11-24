@extends('layout.adminlayout')

@section('title', 'Admin')
@section('header', 'Hlavna stranka admina')

@section('content')
<div class="moderator-page">
    <div class="moderator-container">
        <a href="{{ route('show_users') }}" class="styled-button">
            Spravovať Užívateľov
        </a>

        <br />
        <br />
        <br />

        <a href="{{ route('show_moderators') }}" class="styled-button">
            Spravovať Moderátorov
        </a>
    </div>
</div>
@endsection