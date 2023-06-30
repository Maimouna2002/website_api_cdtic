@extends('layouts.contentNavbarLayout')

@section('topButtons')
    <div class="btn-toolbar mb-2 mb-md-0">
        <a class="btn btn-sm btn-outline-secondary" href="{{ route('roles.create') }}">
            <span data-feather="plus"></span>
            Add a Role
        </a>
    </div>
@endsection

@section('content')
    <div class="container">
        <h1>Liste des rôles</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Permissions</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>
                            @foreach ($role->permissions as $permission)
                                <span class="badge bg-primary">{{ $permission->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('roles.edit', $role) }}" class="btn btn-sm btn-primary">Modifier</a>
                            <form action="{{ route('roles.destroy', $role) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce rôle ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('roles.create') }}" class="btn btn-primary">Créer un rôle</a>
    </div>
@endsection
