@extends('layout.user_layout')

@section('content')

<div class="login-page">
    <div class="login-container">
        <h1 class="login-title">Vytvoriť samozber</h1>

        @if ($nabidky->isEmpty())
            <p>Nemáte žiadne ponuky. Pridajte nejaké a potom na ne môžete vytvoriť samozber.</p>
        @else
            <form action="{{ route('samozber.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="miesto" class="form-label">Miesto</label>
                    <input type="text" class="form-control" id="miesto" name="miesto" required>
                </div>
                <div class="form-group">
                    <label for="datum_a_cas" class="form-label">Dátum a Čas</label>
                    <input type="datetime-local" class="form-control" id="datum_a_cas" name="datum_a_cas" required>
                </div>
                <div class="form-group">
                    <label for="id_nabidka" class="form-label">Nabídka</label>
                    <select class="form-control" id="id_nabidka" name="id_nabidka" required>
                        <option value="" disabled selected>Vyberte nabídku</option>
                        @foreach($nabidky as $nabidka)
                            <option value="{{ $nabidka->id }}">{{ $nabidka->meno }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="id_uzivatel" value="{{ Auth::user()->id }}">
                <button type="submit" class="btn btn-primary">Vytvoriť samozber</button>
            </form>
        @endif
    </div>
</div>

@endsection