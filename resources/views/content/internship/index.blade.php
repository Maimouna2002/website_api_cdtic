@extends('layouts.contentNavbarLayout')


@section('content')
<div class="card mb-4">
  <div class="card-body">
      <div class="d-sm-flex align-items-center justify-content-between">
          <h3 class="mb-0 bc-title"><b>{{ __('Gestion Des Stage') }}</b></h3>
          <a class="btn btn-primary btn-sm" href="{{ route('internships.create') }}" title="{{ __('Créer un stage') }}"><i class="bx bxs-plus bx-xs"></i> {{ __('Ajouter') }}</a>
      </div>
  </div>
</div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Demande de stage</th>
                    <th>Rapport de stage</th>
                    <th>Statut</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($internships as $internship)
                    <tr>
                        <td>{{ $internship->id }}</td>
                        <td>{{ $internship->application->motivation_letter }}</td>
                        <td>{{ $internship->report_file }}</td>
                        <td>{{ $internship->status }}</td>
                        <td>
                            <a href="{{ route('internships.show', $internship) }}" class="btn btn-sm btn-primary">Détails</a>
                            <a href="{{ route('internships.edit', $internship) }}" class="btn btn-sm btn-primary">Modifier</a>
                            <form action="{{ route('internships.destroy', $internship) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce stage ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
