@extends('layout.moderator_layout')

@section('title', 'Navrhy')
@section('header', 'Navrhy')

@section('content')
<div class="moderator-page">
    <div class="moderator-container">
        <h2>Navrhované kategórie</h2>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Názov návrhu</th>
                    <th>Dátum vytvorenia</th>
                    <th>Akcie</th>
                </tr>
            </thead>
            <tbody>
                @foreach($navrhy as $navrh)
                    <tr>
                        <td>{{ $navrh->id }}</td>
                        <td>{{ $navrh->meno }}</td>
                        <td>{{ $navrh->created_at }}</td>
                        <td>
                            <a href="{{ route('show_navrh_detail', ['id'=> $navrh->id]) }}" class="action-link">Zobraz detail návrhu</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection