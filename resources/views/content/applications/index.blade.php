@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')


@section('content')

    <div class="container">
        <h1>Liste des Candidatures</h1>
        <a href="{{ route('applications.create') }}" class="btn btn-primary">Ajouter une Candidatures</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Utilisateur</th>
                    <th>Offre</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applications as $application)
                    <tr>
                        <td>{{ $application->id }}</td>
                        <td>{{ $application->user->name }}</td>
                        <td>{{ $application->offer->description }}</td>
                        <td>{{ $application->status }}</td>
                        <td>
                            <a href="{{ route('applications.show', $application->id) }}" class="btn btn-info">Voir</a>
                            <a href="{{ route('applications.edit', $application->id) }}" class="btn btn-primary">Modifier</a>
                            <form action="{{ route('applications.destroy', $application->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette application ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
