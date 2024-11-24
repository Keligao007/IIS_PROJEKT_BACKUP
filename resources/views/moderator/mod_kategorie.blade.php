@extends('layout.moderator_layout')

@section('title', 'Kategorie')
@section('header', 'Kategorie')

@section('content')
<div class="moderator-page">
    <div class="moderator-container">
        <h2>Základné kategórie pre stromovú štruktúru</h2>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Meno</th>
                </tr>
            </thead>
            <tbody>
                @foreach($default_kategorie as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->meno }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <br />
        <br />

        <h2>Uživateľom prístupné kategórie</h2>

        <table class="styled-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Meno</th>
                    <th>Akcie</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kategorie as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->meno }}</td>
                        <td>
                            <a href="{{ route('show_kategorie_detail', ['id'=> $item->id]) }}" class="action-link">Spravovať atribúty</a>
                            <form action="{{ route('delete_kategoria', ['id' => $item->id]) }}" method="POST" style="display: inline;" onsubmit="return confirm('Naozaj chcete vymazať?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button">Zmazať</button>
                            </form>
                        </td>
                    </tr>
                    @if($item->atributy->isNotEmpty())
                        <tr>
                            <td colspan="3">
                                <strong>Atribúty:</strong>
                                <ul>
                                    @foreach($item->atributy as $attribute)
                                        <li>{{ $attribute->nazov }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection