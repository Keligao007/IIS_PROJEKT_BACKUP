@extends('layout.user_layout')

@section('title', 'Vlozit nabidku')
@section('header', 'Vlozit nabidku')

@section('content')
<div class="login-page">
    <div class="login-container">
        <h2>Vložiť nabídku (stáva sa farmárom)</h2>

        <!-- Formulár na výber kategórie -->
        <form action="{{ route('vlozit_nabidku') }}" method="GET">
            <!-- CSRF token nie je potrebný pre GET -->
            <div class="mb-3">
                <label for="id_kategoria_plodin" class="form-label">Kategória plodín:</label>
                <select name="id_kategoria_plodin" id="id_kategoria_plodin" class="form-control" required>
                    <option value="">-- Vyberte kategóriu --</option>
                    @foreach($kategorie as $kategoria)
                        <option value="{{ $kategoria->id }}" {{ request('id_kategoria_plodin') == $kategoria->id ? 'selected' : '' }}>
                            {{ $kategoria->meno }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-secondary" style="margin-bottom: 20px;">Vybrať kategóriu</button>
        </form>

        @if($atributy->isNotEmpty())
        <!-- Formulár na zadanie ponuky -->
        <form action="{{ route('ulozit_nabidku') }}" method="POST">
            @csrf

            <!-- Názov ponuky -->
            <div class="mb-3">
                <label for="meno" class="form-label">Názov ponuky</label>
                <input type="text" name="meno" id="meno" class="form-control" required>
            </div>

            <!-- Skryté pole na kategóriu -->
            <input type="hidden" name="id_kategoria_plodin" value="{{ request('id_kategoria_plodin') }}">

            <!-- Atribúty kategórie -->
            @foreach($atributy as $atribut)
                <div class="mb-3">
                    <label for="atribut_{{ $atribut->id }}" class="form-label">{{ $atribut->nazov }}</label>
                    <input type="text" name="atributy[{{ $atribut->id }}][hodnota]" id="atribut_{{ $atribut->id }}" class="form-control" required>
                    <input type="hidden" name="atributy[{{ $atribut->id }}][id]" value="{{ $atribut->id }}">
                </div>
            @endforeach

            <!-- Odoslanie formulára -->
            <button type="submit" class="btn approve-button" style="background-color: green";>Vytvoriť ponuku</button>
        </form>
        @endif
    </div>
</div>
@endsection