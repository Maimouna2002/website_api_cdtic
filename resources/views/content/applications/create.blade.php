@extends('layouts/contentNavbarLayout')

@section('content')
<div class="container">
    <h1>Ajouter une candidature</h1>
    <form method="post" action="{{ route('applications.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="user_id">Candidat</label>
            <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
                <option value="">Sélectionnez un candidat</option>
                @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="offer_id">Offre</label>
            <select class="form-control @error('offer_id') is-invalid @enderror" id="offer_id" name="offer_id">
                <option value="">Sélectionnez une offre</option>
                @foreach ($offers as $offer)
                <option value="{{ $offer->id }}" {{ old('offer_id') == $offer->id ? 'selected' : '' }}>{{ $offer->description }}</option>
                @endforeach
            </select>
            @error('offer_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="motivation_letter">Lettre de motivation</label>
            <input type="file" class="form-control-file @error('motivation_letter') is-invalid @enderror" id="motivation_letter" name="motivation_letter">
            @error('motivation_letter')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
          <label for="cv">CV</label>
          <input type="file" class="form-control-file @error('cv') is-invalid @enderror" id="cv" name="cv">
          @error('cv')
              <div class="invalid-feedback">{{ $message }}</div>
          </div>
          @enderror
      </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                <option value="">Sélectionnez un status</option>
                <option value="En attente" {{ old('status') == 'En attente' ? 'selected' : '' }}>En attente</option>
                <option value="Accepté" {{ old('status') == 'Accepté' ? 'selected' : '' }}>Accepté</option>
                <option value="Refusé" {{ old('status') == 'Refusé' ? 'selected' : '' }}>Refusé</option>
            </select>
            @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection
