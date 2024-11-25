@extends('layout.user_layout')

@section('title', 'Moje Objednavky')
@section('header', 'Moje Objednavky')

@section('content')
    <div class="show-nabidky-container">
        <h2 class="show-nabidky-section-title">Moje Objednávky</h2>
        @if ($objednavky->isEmpty())
            <p class="alert alert-danger">Nemáte žiadne objednávky.</p>
        @else
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>ID Objednávky</th>
                        <th>Nabídka</th>
                        <th>Atribúty</th>
                        <th>Suma</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($objednavky as $objednavka)
                        <tr>
                            <td>{{ $objednavka->id }}</td>
                            <td>{{ $objednavka->nabidka->meno }}</td>
                            <td>
                                <ul class="styled-list">
                                    @foreach ($objednavka->objednavkaAtribut as $atribut)
                                        <li class="attribute-item">
                                            {{ $atribut->atribut->nazov }}: {{ $atribut->hodnota }}
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="suma-cell">
                                @if ($objednavka->suma > 0)
                                    {{ $objednavka->suma }} €
                                @else
                                    <span class="text-danger">Nedostupné</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection