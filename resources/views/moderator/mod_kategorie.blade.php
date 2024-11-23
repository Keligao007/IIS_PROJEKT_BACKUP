@extends('layout.moderator_layout')

@section('title', 'Kategorie')
@section('header', 'Kategorie')


<?php
if (isset($_SESSION['user']))
{
    //echo "Current user: <strong>" . $_SESSION['user'] . '</strong>';
    //echo '<p><a href="admin.php">Go to admin page</a>';
    //echo '<p><a href="logout.php">Logout</a>';
    ?><h1>SI TU</h1><?php
}
else
{
    ?><h1>NEPRIHLASENY</h1><?php
}
?>

@section('content')
    <!-- <h2>vitajte na nasej stranke</h2> -->

    <h2>Základné kategórie pre stromovú štruktúru</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Meno</th>
            </tr>
        </thead>
        <tbody>
            @foreach($default_kategorie as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->meno }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br />
    <br />

    <h2>Uživateľom prístupné kategórie</h2>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Meno</th>
                <th>Akcie</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kategorie as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->meno }}</td>
                    <td>
                        <a href="{{ route('show_kategorie_detail', ['id'=> $item->id]) }}">Spravovať atribúty</a>
                        <form action="{{ route('delete_kategoria', ['id' => $item->id]) }}" method="POST" style="display: inline;" onsubmit="return confirm('Naozaj chcete vymazať?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Zmazať</button>
                        </form>
                    </td>
                </tr>
                @if($item->atributy->isNotEmpty())
                    <tr>
                        <td colspan="3">
                            <strong>Atribúty:</strong>
                            <ul>
                                @foreach($item->atributy as $attribute)
                                    <li>{{ $attribute->nazov }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
@endsection