<!-- resources/views/samozber/index.blade.php -->

@extends('layout.user_layout')

@section('content')
<div class="samozber-page">
    <div class="samozber-container">
        <h1>Samozber List</h1>
        <div class="table-container">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Miesto</th>
                        <th>Dátum a Čas</th>
                        <th>Nabídka (ID)</th>
                        <th>Organizátor (ID)</th>
                        <th>Registracia na samozber</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($samozbery as $samozber)
                        <tr>
                            <td>{{ $samozber->miesto }}</td>
                            <td>{{ $samozber->datum_a_cas }}</td>
                            <td>{{ $samozber->id_nabidka }}</td> <!-- id nabidky, ktorej sa to kona  -->
                            <td>{{ $samozber->id_uzivatel }}</td> <!-- ten co ho organizuje -->
                            <td>
                                @if(!in_array($samozber->id, $registeredSamozbery))
                                    <form action="{{ route('samozber.register', $samozber->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Zaregistrovať sa na Samozber</button>
                                    </form>
                                @else
                                    <button class="btn btn-secondary" disabled>Už ste zaregistrovaný</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection