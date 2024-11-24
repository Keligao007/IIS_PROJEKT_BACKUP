@extends('layout.user_layout')

@section('title', 'nabidky')
@section('header', 'nabidky')

@section('content')
<div class="container">
    <h1 class="center-text">NABIDKY</h1>

    @if (Auth::check())
        <h2 class="center-text">SI TU</h2>
    @else
        <h2 class="center-text">NEPRIHLASENY</h2>
    @endif

    <h2 class="center-text">Zoznam všetkých ponúk</h2>

    @if ($nabidky->isEmpty())
        <p class="center-text">Žiadne ponuky na zobrazenie.</p>
    @else
        <div class="table-container">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Meno</th>
                        <th>Atribúty</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nabidky as $nabidka)
                        <tr>
                            <td>{{ $nabidka->id }}</td>
                            <td>{{ $nabidka->meno }}</td>
                            <td>
                                <ul class="styled-list">
                                    @foreach ($nabidka->nabidka_atribut as $atribut)
                                        <li>{{ $atribut->nazov }}: {{ $atribut->hodnota }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection