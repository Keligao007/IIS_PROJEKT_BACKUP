@extends('layout.moderator_layout')

@section('title', 'Moderator')
@section('header', 'Moderator')


<?php
if (isset($_SESSION['user']))
{
    //echo "Current user: <strong>" . $_SESSION['user'] . '</strong>';
    //echo '<p><a href="admin.php">Go to admin page</a>';
    //echo '<p><a href="logout.php">Logout</a>';
}
else
{

}
?>

@section('content')
    <a href="{{ route('moderator_kategorie') }}">
        <button >Spravovať kategórie</button>
    </a>

    <br />
    <br />
    <br />

    <a href="{{ route('moderator_navrhy') }}">
        <button >Návrhy uživateľov</button>
    </a>
@endsection