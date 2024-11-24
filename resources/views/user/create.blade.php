<!-- resources/views/samozber/create.blade.php -->

@extends('layout.user_layout')

@section('content')
<div class="container">
    <h1>Create Samozber</h1>
    <form action="{{ route('samozber.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="miesto">Miesto</label>
            <input type="text" class="form-control" id="miesto" name="miesto" required>
        </div>
        <div class="form-group">
            <label for="datum_a_cas">Dátum a Čas</label>
            <input type="datetime-local" class="form-control" id="datum_a_cas" name="datum_a_cas" required>
        </div>
        <div class="form-group">
            <label for="id_nabidka">Nabídka</label>
            <select class="form-control" id="id_nabidka" name="id_nabidka" required>
                @foreach(App\Models\Nabidka::all() as $nabidka)
                    <option value="{{ $nabidka->id }}">{{ $nabidka->nazov }}</option>
                @endforeach
            </select>
        </div>
        <!-- <input type="hidden" name="id_uzivatel" value="{{ Auth::user()->id }}"> -->
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection