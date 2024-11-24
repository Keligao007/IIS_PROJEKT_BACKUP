@extends('layout.user_layout')

@section('title', 'nabidky')
@section('header', 'nabidky')

@section('content')
<div class="show-nabidky-container">

    <h2 class="show-nabidky-section-title">Zoznam všetkých ponúk</h2>

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

<!-- doplnit ze pri cislach nech je aj meno atributu. -->

@endsection