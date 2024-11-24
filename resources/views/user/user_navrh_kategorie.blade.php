@extends('layout.user_layout')

@section('title', 'Navrh kategorie')
@section('header', 'Navrh kategorie')

@section('content')
<div class="login-page">
    <div class="login-container">
        <h2>Navrhnúť novú kategóriu</h2>
        <form action="{{ route('ulozit_navrh_kategorie') }}" method="POST" onsubmit="return validateForm()">
            @csrf
            <!-- Meno novej kategórie -->
            <div class="mb-3">
                <label for="meno" class="form-label">Meno kategórie</label>
                <input type="text" name="meno" id="meno" class="form-control" required>
            </div>

            <!-- Výber typu kategórie -->
            <div class="mb-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Výber</th>
                            <th style="padding-left: 40px;">Názov kategórie</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kategorie as $kategoria)
                            <tr>
                                <td>
                                    <input type="radio" name="parent_kategoria_id" value="{{ $kategoria->id }}" id="kategoria_{{ $kategoria->id }}" class="form-check-input" required>
                                </td>
                                <td>
                                    <label for="kategoria_{{ $kategoria->id }}" class="form-check-label" style="padding-left: 40px;">{{ $kategoria->meno }}</label>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Výber atribútov -->
            <div class="mb-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Výber</th>
                            <th style="padding-left: 40px;">Názov atribútu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($atributy as $atribut)
                            <tr>
                                <td>
                                    <input type="checkbox" name="atributy[]" value="{{ $atribut->id }}" id="atribut_{{ $atribut->id }}" class="form-check-input">
                                </td>
                                <td>
                                    <label for="atribut_{{ $atribut->id }}" class="form-check-label" style="padding-left: 40px;">{{ $atribut->nazov }}</label>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Tlačidlo na odoslanie -->
            <button type="submit" class="btn btn-primary">Navrhnúť kategóriu</button>
        </form>
    </div>
</div>

<script>
function validateForm() {
    const checkboxes = document.querySelectorAll('input[name="atributy[]"]');
    let checkedOne = Array.prototype.slice.call(checkboxes).some(x => x.checked);

    if (!checkedOne) {
        alert('Musíte vybrať aspoň jeden atribút.');
        return false;
    }
    return true;
}
</script>

@endsection