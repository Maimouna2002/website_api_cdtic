@extends('layouts.contentNavbarLayout')

@section('content')
    <div class="container">
        <h1>Détails de l'utilisateur</h1>
        <table class="table">
            <tbody>
                <tr>
                    <th>Nom</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Rôles</th>
                    <td>
                        @foreach ($user->roles as $role)
                            <span class="badge bg-primary">{{ $role->name }}</span>
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Retour</a>
    </div>
@endsection
