@extends('layout.layout')

@section('title', 'Home')
@section('header', 'Home')

@section('content')

<div style="margin-bottom: 20px; text-align: center;">
    <form method="GET" action="{{ route('index') }}" style="display: inline-block;">
        <label>
            <input type="checkbox" name="kategorie[]" value="2" 
                {{ in_array(2, request('kategorie', [])) ? 'checked' : '' }}>
            Ovocie
        </label>
        <label>
            <input type="checkbox" name="kategorie[]" value="3"
                {{ in_array(3, request('kategorie', [])) ? 'checked' : '' }}>
            Zelenina
        </label>
        <button type="submit" style="margin-left: 10px;">Filtrovať</button>
    </form>
</div>

<div style="display: flex; flex-direction: column; align-items: center; gap: 20px; margin-top: 20px;">
    @if ($nabidky && $nabidky->isNotEmpty())
        @foreach ($nabidky as $nabidka)
            <div style="border: 1px solid #ddd; padding: 20px; width: 50%; border-radius: 10px; background-color: #f9f9f9;">
                <h2 style="text-align: center;">{{ $nabidka->meno }}</h2>
                <div>
                    @if ($nabidka->nabidka_atribut && $nabidka->nabidka_atribut->isNotEmpty())
                        <ul style="list-style: none; padding: 0;">
                            @foreach ($nabidka->nabidka_atribut as $atribut)
                                <li style="margin-bottom: 10px;">
                                    <strong>{{ $atribut->atribut->nazov ?? 'Neznámy atribút' }}:</strong>
                                    {{ $atribut->hodnota ?? 'N/A' }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p style="text-align: center; color: #888; font-size: 60px">Žiadne atribúty</p>
                    @endif
                </div>
            </div>
        @endforeach
    @else
        <p style="text-align: center; color: #888;">Zatiaľ žiadne nabídky.</p>
    @endif
</div>

@endsection