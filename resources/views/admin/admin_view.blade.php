<?php
use Illuminate\Support\Facades\Auth;
?>
@extends('layout.adminlayout')

@section('title', 'admin')
@section('header', 'Hlavna stranka admina')

@section('content')


<div class="center-text">
          <?php
              // Check if the user is logged in using Auth::check()
              if (Auth::check()) {
                  // If the user is authenticated, display their login name
                  echo "<h3>You are logged in as user: " . htmlspecialchars(Auth::user()->login) . "</h3>";
              } else {
                  // If the user is not authenticated, display a message
                  echo "<h3>You are not logged in.</h3>";
              }
          ?>
      </div>

<!-- <h2>vitajte na nasej stranke</h2> -->
<a href="{{ route('show_users') }}">
        <button >Spravovat Uzivatelov</button>
    </a>

    <br />
    <br />
    <br />

    <a href="{{ route('show_moderators') }}">
        <button >Spravovat Moderatorov</button>
    </a>

@endsection