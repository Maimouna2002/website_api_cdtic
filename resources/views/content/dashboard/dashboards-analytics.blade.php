@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Statistiques</h5>
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">Offres de stage</h6>
            <p class="card-text"> nombreOffresStage </p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">Candidatures</h6>
            <p class="card-text"> nombreCandidatures </p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">Utilisateurs</h6>
            <p class="card-text">nombreUtilisateurs</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
