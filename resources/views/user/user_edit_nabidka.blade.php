@extends('layout.user_layout')

@section('content')
<div class="container">
    <h1>Upraviť Ponuku</h1>

    <form action="{{ route('nabidka_update', $nabidka->id) }}" method="POST">
        @csrf

        <!-- Názov ponuky -->
        <div class="mb-3">
            <label for="meno" class="form-label">Názov Ponuky</label>
            <input type="text" id="meno" name="meno" class="form-control" value="{{ $nabidka->meno }}" required>
        </div>

        <!-- Atribúty ponuky -->
        @foreach ($nabidka->atributy as $atribut)
            <div class="mb-3">
                <label for="atribut_{{ $atribut->id }}" class="form-label">{{ $atribut->atribut->nazov }}</label>
                <input type="text" id="atribut_{{ $atribut->id }}" name="atributy[{{ $atribut->id }}]" 
                    class="form-control" value="{{ $atribut->hodnota }}" required>
            </div>
        @endforeach

        <!-- Tlačidlá -->
        <button type="submit" class="btn btn-success">Uložiť</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Späť</a>
    </form>
</div>
@endsection