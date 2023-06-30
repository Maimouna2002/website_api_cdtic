@extends('layouts.contentNavbarLayout')


@section('content')
<div class="card mb-4">
  <div class="card-body">
      <div class="d-sm-flex align-items-center justify-content-between">
          <h3 class="mb-0 bc-title"><b>{{ __('Détails du stage') }}</b> </h3>
          <a class="btn btn-primary btn-sm" href="{{route('internships.index')}}"><i class="bx bxs-chevron-left bx-xs"></i> {{ __('Retour') }}</a>
          </div>
  </div>
</div>
    <div class="container">
        <table class="table">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $internship->id }}</td>
                </tr>
                <tr>
                    <th>Demande de stage</th>
                    <td>{{ $internship->application->motivation_letter }}</td>
                </tr>
                <tr>
                    <th>Rapport de stage</th>
                    <td>{{ $internship->report_file }}</td>
                </tr>
                <tr>
                    <th>Statut</th>
                    <td>{{ $internship->status }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('internships.index') }}" class="btn btn-secondary">Retour</a>
    </div>
@endsection
