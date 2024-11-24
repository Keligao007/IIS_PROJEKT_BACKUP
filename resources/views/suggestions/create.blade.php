<!-- resources/views/suggestions/create.blade.php -->

@extends('layout.layout')

@section('content')
<div class="container">
    <h1>Make a Suggestion</h1>
    <form action="{{ route('suggestions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="meno">Meno</label>
            <input type="text" class="form-control" id="meno" name="meno" required>
        </div>
        <div class="form-group">
            <label for="parent_kategoria_id">Parent Kategoria</label>
            <select class="form-control" id="parent_kategoria_id" name="parent_kategoria_id" required>
                <option value="2">Ovocie</option>
                <option value="3">Zelenina</option>
            </select>
        </div>
        <input type="hidden" name="id_uzivatel" value="{{ Auth::user()->id }}">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection