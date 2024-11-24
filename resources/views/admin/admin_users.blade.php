@extends('layout.adminlayout')

@section('title', 'Admin')
@section('header', 'Uzivatelia')

@section('content')
<div class="moderator-page">
    <div class="moderator-container">
        <h1 class="moderator-section-title">List všetkých registrovaných uživateľov:</h1>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>ID:</th>
                    <th>Login:</th>
                    <th>Zmeny:</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->login }}</td>
                        <td>
                            <!-- Delete Form -->
                            <form action="{{ route('delete_user', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-nabidka-delete">Vymazať profil</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection