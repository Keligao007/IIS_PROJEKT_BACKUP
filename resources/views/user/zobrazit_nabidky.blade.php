@extends('layout.user_layout')

@section('content')
<h1>Moje nabídky</h1>

<!-- <div class="container">
    <h1>Moje Ponuky</h1>

    @if ($nabidky->isEmpty())
        <p>Nemáte žiadne ponuky.</p>
    @else
        @foreach ($nabidky as $nabidka)
            <div class="card mb-3">
                <div class="card-header">
                    <strong>{{ $nabidka->meno }}</strong>
                </div>
                <div class="card-body">
                    <ul>
                        @foreach ($nabidka->atributy as $atribut)
                            <li>
                                <strong>{{ $atribut->atribut->nazov }}:</strong> {{ $atribut->hodnota }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    @endif
</div> -->

<div class="container">
    <h1>Moje Ponuky</h1>

    @if ($nabidky->isEmpty())
        <p>Nemáte žiadne ponuky.</p>
    @else
        @foreach ($nabidky as $nabidka)
            <div class="card mb-3">
                <div class="card-header">
                    <strong>{{ $nabidka->meno }}</strong>
                </div>
                <div class="card-body">
                    <ul>
                        @foreach ($nabidka->atributy as $atribut)
                            <li>
                                <strong>{{ $atribut->atribut->nazov }}:</strong> {{ $atribut->hodnota }}
                            </li>
                        @endforeach
                    </ul>

                    <!-- Tlačidlo pre úpravu ponuky -->
                    <a href="{{ route('nabidka_edit', $nabidka->id) }}" class="btn btn-primary">
                        Upraviť ponuku
                    </a>
                </div>
            </div>
        @endforeach
    @endif
</div>

@endsection