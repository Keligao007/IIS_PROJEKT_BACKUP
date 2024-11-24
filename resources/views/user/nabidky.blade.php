@extends('layout.user_layout')

@section('title', 'nabidky')
@section('header', 'nabidky')

@section('content')

    <h1>NABIDKY</h1>

    @if (Auth::check())
        <h1>SI TU</h1>
    @else
        <h1>NEPRIHLASENY</h1>
    @endif


    <h1>Zoznam všetkých ponúk</h1>

    @if ($nabidky->isEmpty())
        <p>Žiadne ponuky na zobrazenie.</p>
    @else
        <table border="1">
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
                            <ul>
                                @foreach ($nabidka->nabidka_atribut as $atribut)
                                    <li>{{ $atribut->nazov }}: {{ $atribut->hodnota }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
