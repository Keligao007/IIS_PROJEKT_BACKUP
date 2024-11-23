@extends('layout.moderator_layout')

@section('content')
<h1>Kategória: {{ $kategoria->meno }}</h1>

<h2>Atribúty</h2>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Názov</th>
            <th>Akcie</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kategoria->atributy as $atribut)
        <tr>
            <td>{{ $atribut->id }}</td>
            <td>{{ $atribut->nazov }}</td>
            <td>
                <form action="{{ route('delete_atribut', ['id' => $kategoria->id, 'atributId' => $atribut->id]) }}" method="POST" onsubmit="return confirm('Naozaj chcete zmazať tento atribút?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Zmazať</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


<h2>Pridať nový atribút</h2>
<form action="{{ route('add_atribut', $kategoria->id) }}" method="POST">
    @csrf
    <label for="atribut_id">Atribút:</label>
    <select name="atribut_id" id="atribut_id" required>
        @foreach($nepriradeneAtributy as $atribut)
            <option value="{{ $atribut->id }}">{{ $atribut->nazov }}</option>
        @endforeach
    </select>
    <button type="submit">Pridať</button>
</form>
@endsection