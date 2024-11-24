@extends('layout.adminlayout')

@section('title', 'Admin')
@section('header', 'Moderatori')

@section('content')

<div class="moderator-page">
    <div class="moderator-container">
        <h1 class="moderator-section-title">List všetkých moderátorov:</h1>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>ID:</th>
                    <th>Login:</th>
                    <th>Zmeny:</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user) <!-- Zmena názvu premennej na $mods -->
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->login }}</td>
                        <td>
                            <form action="{{ route('delete_moderator', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this moderator?');" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-nabidka-delete">Vymazať moderátora</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="login-page" style="margin: 20px 0;">
            <div class="login-container">
                <h1 class="login-title">Pridat moderátora:</h1>
                <form action="{{ route('store_moderator') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="login" class="form-label">Login nového moderátora:</label>
                        <input type="text" name="login" id="login" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Heslo nového moderátora:</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Zaregistrovať moderátora</button>
                </form>
            </div>
        </div>
    </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


</div>

@endsection