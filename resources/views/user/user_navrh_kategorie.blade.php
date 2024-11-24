@extends('layout.user_layout')

@section('title', 'Navrh kategorie')
@section('header', 'Navrh kategorie')


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
     <h1>Registrovany uzivatel</h1>

     <div class="container">
        <h2>Navrhnúť novú kategóriu</h2>
        <form action="{{ route('ulozit_navrh_kategorie') }}" method="POST">
            @csrf
            <!-- Meno novej kategórie -->
            <div class="mb-3">
                <label for="meno" class="form-label">Meno kategórie</label>
                <input type="text" name="meno" id="meno" class="form-control" required>
            </div>

            <!-- Výber typu kategórie -->
            <div class="mb-3">
                <label for="parent_kategoria_id" class="form-label">Typ kategórie</label>
                <select name="parent_kategoria_id" id="parent_kategoria_id" class="form-control" required>
                    <option value="">-- Vyber typ kategórie --</option>
                    @foreach($kategorie as $kategoria)
                        <option value="{{ $kategoria->id }}">{{ $kategoria->meno }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Výber atribútov -->
            <div class="mb-3">
                <label for="atributy" class="form-label">Atribúty</label>
                @foreach($atributy as $atribut)
                    <div class="form-check">
                        <input type="checkbox" name="atributy[]" value="{{ $atribut->id }}" id="atribut_{{ $atribut->id }}" class="form-check-input">
                        <label for="atribut_{{ $atribut->id }}" class="form-check-label">{{ $atribut->nazov }}</label>
                    </div>
                @endforeach
            </div>

            <!-- Tlačidlo na odoslanie -->
            <button type="submit" class="btn btn-primary">Navrhnúť kategóriu</button>
        </form>
    </div>
@endsection