@extends('layouts/contentNavbarLayout')

@section('content')
<div class="container">
<h1>Liste des candidatures</h1>
<a class="btn btn-primary mb-3" href="{{ route('applications.create') }}">
<i class="bx bx-plus"></i> Ajouter une candidature
</a>
@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
<table class="table">
<thead>
<tr>
<th>ID</th>
<th>Candidat</th>
<th>Offre</th>
<th>Lettre de motivation</th>
<th>CV</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
@foreach ($applications as $application)
<tr>
<td>{{ $application->id }}</td>
<td>{{ $application->user->name }}</td>
<td>{{ $application->offer->description }}</td>
<td>
<a href="{{ asset($application->motivation_letter_path) }}" target="_blank">
<i class="bx bxs-file-pdf"></i> Voir la lettre
</a>
</td>
<td>
<a href="{{ asset($application->cv_path) }}" target="_blank">
<i class="bx bxs-file-pdf"></i> Voir le CV
</a>
</td>
<td>{{ $application->status }}</td>
<td>
<a class="btn btn-primary" href="{{ route('applications.show', $application->id) }}"><i class="bx bx-show"></i></a>
<a class="btn btn-warning" href="{{ route('applications.edit', $application->id) }}"><i class="bx bx-edit"></i></a>
<form class="d-inline" action="{{ route('applications.destroy', $application->id) }}" method="post">
@csrf
@method('DELETE')
<button class="btn btn-danger" type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette candidature ?')">
<i class="bx bx-trash"></i></button>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
@endsection
