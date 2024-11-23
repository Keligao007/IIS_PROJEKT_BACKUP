@extends('layout.moderator_layout')

@section('title', 'Navrhy')
@section('header', 'Navrhy')


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
<h2>Navrhované kategórie</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Názov návrhu</th>
                <th>Dátum vytvorenia</th>
                <th>Akcie</th>
            </tr>
        </thead>
        <tbody>
            @foreach($navrhy as $navrh)
                <tr>
                    <td>{{ $navrh->id }}</td>
                    <td>{{ $navrh->meno }}</td>
                    <td>{{ $navrh->created_at }}</td>
                    <td>
                        <a href="{{ route('show_navrh_detail', ['id'=> $navrh->id]) }}">Zobraz detail návrhu</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection