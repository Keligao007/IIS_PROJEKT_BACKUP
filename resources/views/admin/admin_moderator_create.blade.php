@extends('layout.adminlayout')

@section('title', 'admin_moderator_create')
@section('header', 'Tvorba moderatorov')

@section('content')

<h1>List of Registered Moderators</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Login</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user) <!-- Zmena názvu premennej na $mods -->
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->login }}</td>
                    <td>
                        <form action="{{ route('delete_moderator', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this moderator?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


<h1>Pridat Moderatora</h1>
    <div>
        <form action="{{ route('store_moderator') }}" method="post">
            @csrf
            <label for="login">Login</label>
            <input type="text" name="login" id="login"><br>

            <label for="password">Password</label>
            <input type="password" name="password" id="password"><br>

            <input type="submit" value="register moderator">
        </form>
    </div>

@endsection
