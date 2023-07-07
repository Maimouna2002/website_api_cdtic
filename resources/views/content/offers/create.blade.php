@extends('layouts.contentNavbarLayout')

@section('title', 'Offers - Create')

@section('content')
<!-- Start of Main Content -->
<div class="container-fluid">
    <!-- Page Heading -->
<!-- Page Heading -->
<div class="card mb-4">
  <div class="card-body">
      <div class="d-sm-flex align-items-center justify-content-between">
          <h3 class="mb-0 bc-title"><b>{{ __('Créer Une Offre') }}</b> </h3>
          <a class="btn btn-primary btn-sm" href="{{route('offers.index')}}"><i class="bx bxs-chevron-left bx-xs"></i> {{ __('Retour') }}</a>
          </div>
  </div>
</div>
    <div class="card shadow mb-6">
        <div class="card-body">
            <form method="POST" action="{{ route('offers.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="domain" class="form-label">{{ __('Domaine') }}</label>
                    <select name="domain_id" id="domain" class="form-select @error('domain_id') is-invalid @enderror" aria-label="{{ __('Domaine') }}" autofocus>
                        <option selected disabled>{{ __('Sélectionner un domaine') }}</option>
                        @foreach ($domains as $domain)
                            <option value="{{ $domain->id }}" {{ old('domain_id') == $domain->id ? 'selected' : '' }}>{{ $domain->name }}</option>
                        @endforeach
                    </select>
                    @error('domain_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                  <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" class="form-control" rows="5"></textarea>
                </div>
                  @error('description')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
                <div class="mb-3">
                    <label for="type_offer" class="form-label">{{ __('Type Offre') }}</label>
                    <select name="type_offer_id" id="type_offer" class="form-select @error('type_offer_id') is-invalid @enderror" aria-label="{{ __('Type Offre') }}">
                        <option selected disabled>{{ __('Sélectionner un type de offre') }}</option>
                        @foreach ($typeOffers as $typeOffer)
                            <option value="{{ $typeOffer->id }}" {{ old('type_offer_id') == $typeOffer->id ? 'selected' : '' }}>{{ $typeOffer->name }}</option>
                        @endforeach
                    </select>
                    @error('type_offer_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="levels" class="form-label">{{ __('Niveau') }}</label>
                    <select name="levels[]" id="levels" class="form-select @error('levels') is-invalid @enderror" multiple aria-label="{{ __('Niveau') }}">
                        @foreach ($levels as $level)
                            <option value="{{ $level->id }}" {{ in_array($level->id, old('levels', [])) ? 'selected' : '' }}>{{ $level->name }}</option>
                        @endforeach
                    </select>
                    @error('levels')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="available_places" class="form-label">{{ __('Places disponibles') }}</label>
                    <input type="number" name="available_places" id="available_places" class="form-control @error('available_places') is-invalid @enderror" value="{{ old('available_places') }}" aria-label="{{ __('Places disponibles') }}">
                    @error('available_places')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="date_start" class="form-label">{{ __('Date de début') }}</label>
                    <input type="date" name="date_start" id="date_start" class="form-control @error('date_start') is-invalid @enderror" value="{{ old('date_start') }}" aria-label="{{ __('Date de début') }}">
                    @error('date_start')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="date_end" class="form-label">{{ __('Date de fin') }}</label>
                    <input type="date" name="date_end" id="date_end" class="form-control @error('date_end') is-invalid @enderror" value="{{ old('date_end') }}" aria-label="{{ __('Date de fin') }}">
                    @error('date_end')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">{{ __('Créer') }}</button>
                <a class="btn btn-secondary" href="{{ route('offers.index') }}">
                  {{ __('Annuler') }}
              </a>
            </form>
        </div>
    </div>
</div>
<!-- End of Main Content -->
@endsection
