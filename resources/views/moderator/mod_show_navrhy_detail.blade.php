@extends('layout.moderator_layout')

@section('title', 'Návrh kategórie')
@section('header', 'Návrh kategórie')

@section('content')
<h1>Návrh: {{ $navrh->meno }}</h1>

<h2>Otcovská kategória: {{ $parent_name->parent_kategoria->meno }}</h2>

<h2>Atribúty</h2>

<ul>
    @foreach($atributy->atributy as $atribut)
        <li>{{ $atribut->atribut->nazov }}</li>
    @endforeach
</ul>

<form action="{{ route('navrh_odmietnut', $navrh->id) }}" method="POST" onsubmit="return confirm('Naozaj chcete tento návrh odmietnuť?');">
    @csrf
    @method('DELETE')
    <button type="submit">Odmietnuť</button>
</form>

<form action="{{ route('navrh_schvalit', $navrh->id) }}" method="POST" onsubmit="return confirm('Naozaj chcete tento návrh schváliť?');">
    @csrf
    <button type="submit">Schváliť</button>
</form>


@endsection