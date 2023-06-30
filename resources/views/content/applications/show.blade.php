@extends('layouts/contentNavbarLayout')


@section('content')
    <div class="container">
        <h1>Détails de la Candidature</h1>
        <table class="table">
            <tr>
                <th>ID</th>
                <td>{{ $application->id }}</td>
            </tr>
            <tr>
                <th>Utilisateur</th>
                <td>{{ $application->user->name }}</td>
            </tr>
            <tr>
                <th>Offre</th>
                <td>{{ $application->offer->description }}</td>
            </tr>
            <tr>
              <th>motivation_letter</th>
              <td>{{ $application->motivation_letter }}</td>
          </tr>
            <tr>
                <th>Statut</th>
                <td>{{ $application->status }}</td>
            </tr>
        </table>
        <a href="{{ route('applications.edit', $application->id) }}" class="btn btn-primary">Modifier</a>
        <form action="{{ route('applications.destroy', $application->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette application ?')">Supprimer</button>
        </form>
    </div>
@endsection
