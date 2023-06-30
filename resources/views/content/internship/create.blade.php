@extends('layouts.contentNavbarLayout')


@section('content')
<div class="card mb-4">
  <div class="card-body">
      <div class="d-sm-flex align-items-center justify-content-between">
          <h3 class="mb-0 bc-title"><b>{{ __('Créer Un Stage') }}</b> </h3>
          <a class="btn btn-primary btn-sm" href="{{route('internships.index')}}"><i class="bx bxs-chevron-left bx-xs"></i> {{ __('Retour') }}</a>
          </div>
  </div>
</div>

    <div class="container">
        <h1>Créer un stage</h1>
        <form action="{{ route('internships.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="application_id" class="form-label">Demande de stage</label>
                <select name="application_id" id="application_id" class="form-control" required>
                    @foreach ($applications as $application)
                        <option value="{{ $application->id }}">{{ $application->motivation_letter }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="report_file" class="form-label">Rapport de stage</label>
                <input type="file" name="report_file" id="report_file" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Statut</label>
                <input type="text" name="status" id="status" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Créer</button>
            <a href="{{ route('internships.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection
