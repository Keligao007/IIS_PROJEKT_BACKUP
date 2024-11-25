@extends('layout.user_layout')

@section('title', 'Moje Objednavky')
@section('header', 'Moje Objednavky')


@section('content')
    <div class="container">
        <h1>Moje objednávky</h1>

        @if ($objednavky->isEmpty())
            <p>Nemáte žiadne objednávky.</p>
        @else
            <table border="1">
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
                                <ul>
                                    @foreach ($objednavka->objednavkaAtribut as $atribut)
                                        <li>
                                            {{ $atribut->atribut->nazov }}: {{ $atribut->hodnota }}
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                @if ($objednavka->suma > 0)
                                    {{ $objednavka->suma }} €
                                @else
                                    <span style="color: red;">Nedostupné</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif


    </div>
@endsection