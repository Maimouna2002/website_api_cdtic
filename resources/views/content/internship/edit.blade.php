@extends('layouts.contentNavbarLayout')


@section('content')

<!-- Page Heading -->
<div class="card mb-4">
  <div class="card-body">
      <div class="d-sm-flex align-items-center justify-content-between">
          <h3 class="mb-0 bc-title"><b>{{ __('Modifier le stage') }}</b> </h3>
          <a class="btn btn-primary btn-sm" href="{{route('internships.index')}}"><i class="bx bxs-chevron-left bx-xs"></i> {{ __('Retour') }}</a>
          </div>
  </div>
</div>
    <div class="container">
        <form action="{{ route('internships.update', $internship) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="application_id" class="form-label">Demande de stage</label>
                <select name="application_id" id="application_id" class="form-control" required>
                    @foreach ($applications as $application)
                        <option value="{{ $application->id }}" {{ $internship->application_id == $application->id ? 'selected' : '' }}>{{ $application->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="report_file" class="form-label">Rapport de stage</label>
                <input type="text" name="report_file" id="report_file" class="form-control" value="{{ $internship->report_file }}" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Statut</label>
                <input type="text" name="status" id="status" class="form-control" value="{{ $internship->status }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{ route('internships.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection
