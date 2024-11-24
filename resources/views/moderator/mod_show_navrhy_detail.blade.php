@extends('layout.moderator_layout')

@section('title', 'Návrh kategórie')
@section('header', 'Návrh kategórie')

@section('content')
<div class="moderator-page">
    <div class="moderator-container">
        <h1>Návrh: {{ $navrh->meno }}</h1>

        <h2>Otcovská kategória: {{ $parent_name->parent_kategoria->meno }}</h2>

        <h2>Atribúty</h2>
        <ul class="styled-list">
            @foreach($atributy->atributy as $atribut)
                <li>{{ $atribut->atribut->nazov }}</li>
            @endforeach
        </ul>

        <form action="{{ route('navrh_odmietnut', $navrh->id) }}" method="POST" onsubmit="return confirm('Naozaj chcete tento návrh odmietnuť?');" class="styled-form">
            @csrf
            @method('DELETE')
            <button type="submit" class="not-approve-button">Odmietnuť</button>
        </form>

        <form action="{{ route('navrh_schvalit', $navrh->id) }}" method="POST" onsubmit="return confirm('Naozaj chcete tento návrh schváliť?');" class="styled-form">
            @csrf
            <button type="submit" class="approve-button">Schváliť</button>
        </form>
    </div>
</div>
@endsection