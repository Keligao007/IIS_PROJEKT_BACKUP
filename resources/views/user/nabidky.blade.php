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

        <a href="{{ route('show_objednavka') }}">Moje objednávky</a>

            <table class="styled-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Meno</th>
                        <th>Atribúty</th>
                        <th>Akcia</th> <!-- Nový stĺpec -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nabidky as $nabidka)
                        <tr>
                            <td>{{ $nabidka->id }}</td>
                            <td>{{ $nabidka->meno }}</td>
                            <td>
                                <ul>
                                    @foreach ($nabidka->nabidka_atribut as $nabidkaAtribut)
                                        <li>{{ $nabidkaAtribut->atribut->nazov }}: {{ $nabidkaAtribut->hodnota }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <!-- Tlačidlo Pridať do košíka s množstvom -->
                                <form method="POST" action="{{ route('store_order', $nabidka->id) }}">
                                    @csrf
                                    <label for="mnozstvo-{{ $nabidka->id }}">Množstvo:</label>
                                    <input type="number" name="mnozstvo" id="mnozstvo-{{ $nabidka->id }}" min="1" step="1" required>
                                    <button style="margin-top: 20px;" type="submit" class="btn btn-order">Objednať</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </tbody>
            </table>
        </div>
    @endif
</div>

<!-- doplnit ze pri cislach nech je aj meno atributu. -->

@endsection