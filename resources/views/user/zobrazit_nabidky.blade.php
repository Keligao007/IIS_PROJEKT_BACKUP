@extends('layout.user_layout')

@section('content')

<div class="show-nabidky-container">
    <h2 class="show-nabidky-section-title">Moje Ponuky</h2>

    @if ($nabidky->isEmpty())
        <p class="show-nabidky-no-offers">Nemáte žiadne ponuky.</p>
    @else
        @foreach ($nabidky as $nabidka)
            <div class="show-nabidky-card mb-3">
                <div class="show-nabidky-card-header">
                    <strong>{{ $nabidka->meno }}</strong>
                </div>
                <div class="show-nabidky-card-body">
                    <ul class="show-nabidky-attributes-list">
                        @foreach ($nabidka->atributy as $atribut)
                            <li>
                                <strong>{{ $atribut->atribut->nazov }}:</strong> {{ $atribut->hodnota }}
                            </li>
                        @endforeach
                    </ul>

                    <!-- Tlačidlo pre úpravu ponuky -->
                    <a href="{{ route('nabidka_edit', $nabidka->id) }}" class="btn-nabidka">
                        Upraviť ponuku
                    </a>

                    <!-- Tlačidlo pre zmazanie ponuky -->
                    <form action="{{ route('nabidka_delete', $nabidka->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="max" class="btn-nabidka-delete" onclick="return confirm('Ste si istí, že chcete zmazať túto ponuku?')">
                            Zmazať ponuku
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif
</div>

@endsection