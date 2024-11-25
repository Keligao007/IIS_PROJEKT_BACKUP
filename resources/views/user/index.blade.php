<!-- resources/views/samozber/index.blade.php -->

@extends('layout.user_layout')

@section('content')

<div class="samozber-page">
    <div class="samozber-container">
        <h1>Samozbery, ktoré ste vytvorili</h1>
        <div class="table-container">
            @if ($userCreatedSamozbery->isNotEmpty())
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Miesto</th>
                            <th>Dátum a Čas</th>
                            <th>Ponuka</th>
                            <th>Organizátor</th>
                            <th>Akcie</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userCreatedSamozbery as $samozber)
                            <tr>
                                <td>{{ $samozber->miesto }}</td>
                                <td>{{ $samozber->datum_a_cas }}</td>
                                <td>{{ $samozber->nabidka->meno ?? 'Neznáma ponuka' }}</td>
                                <td>{{ $samozber->farmar->login ?? 'Neznámy organizátor' }}</td>
                                <td>
                                    <form action="{{ route('samozber.destroy', $samozber->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn" style="background-color: red;">Zmazať</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p style="text-align: center; color: #888;">Zatiaľ ste nevytvorili žiadne samozbery.</p>
            @endif
        </div>
    </div>
</div>


<div class="samozber-page">
    <div class="samozber-container">
        <h1>Samozbery, ktorých sa chcete zúčastniť</h1>
        <div class="table-container">
            @if ($registeredSamozbery->isNotEmpty())
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Miesto</th>
                            <th>Dátum a Čas</th>
                            <th>Ponuka</th>
                            <th>Organizátor</th>
                            <th>Akcie</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registeredSamozbery as $samozber)
                            <tr>
                                <td>{{ $samozber->miesto }}</td>
                                <td>{{ $samozber->datum_a_cas }}</td>
                                <td>{{ $samozber->nabidka->meno ?? 'Neznáma ponuka' }}</td>
                                <td>{{ $samozber->farmar->login ?? 'Neznámy organizátor' }}</td>
                                <td>
                                    <form action="{{ route('samozber.unregister', $samozber->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn" style="background-color: red;">Zrušiť účasť</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p style="text-align: center; color: #888;">Zatiaľ sa nezúčastňujete žiadneho samozberu.</p>
            @endif
        </div>
    </div>
</div>


<div class="samozber-page">
    <div class="samozber-container">
        <h1>Samozbery, ktorých sa môžete zúčastniť</h1>
        <div class="table-container">
            @if ($otherSamozbery->isNotEmpty())
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Miesto</th>
                            <th>Dátum a Čas</th>
                            <th>Ponuka</th>
                            <th>Organizátor</th>
                            <th>Akcie</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($otherSamozbery as $samozber)
                            <tr>
                                <td>{{ $samozber->miesto }}</td>
                                <td>{{ $samozber->datum_a_cas }}</td>
                                <td>{{ $samozber->nabidka->meno ?? 'Neznáma ponuka' }}</td>
                                <td>{{ $samozber->farmar->login ?? 'Neznámy organizátor' }}</td>
                                <td>
                                    <form action="{{ route('samozber.register', $samozber->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary" style="background-color: green;">Chcem sa zúčastniť</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p style="text-align: center; color: #888;">Momentálne nie sú dostupné samozbery, ktorých sa môžete zúčastniť.</p>
            @endif
        </div>
    </div>
</div>


@endsection