@extends('layouts.contentNavbarLayout')

@section('title', 'Offers - Create')


@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<div class="card mb-4">
  <div class="card-body">
      <div class="d-sm-flex align-items-center justify-content-between">
          <h3 class="mb-0 bc-title"><b>{{ __('Créer Une Offre') }}</b> </h3>
          <a class="btn btn-primary btn-sm" href="{{route('offers.index')}}"><i class="bx bxs-chevron-left bx-xs"></i> {{ __('Retour') }}</a>
          </div>
  </div>
</div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('offers.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="domain_id">Domaine:</label>
                                <select name="domain_id" id="domain_id" class="form-control">
                                    @foreach($domains as $domain)
                                        <option value="{{ $domain->id }}">{{ $domain->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="type_offer_id">Type Offre:</label>
                                <select name="type_offer_id" id="type_offer_id" class="form-control">
                                    @foreach($typeOffers as $typeOffer)
                                        <option value="{{ $typeOffer->id }}">{{ $typeOffer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" id="description" class="form-control" rows="5"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="date_start">Date Debut:</label>
                                <input type="date" name="date_start" id="date_start" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="date_end">Date Fin:</label>
                                <input type="date" name="date_end" id="date_end" class="form-control">
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="available_places">Places Disponibles:</label>
                                <input type="number" name="available_places" id="available_places" class="form-control">
                            </div>
                            <br>

                            <div>
                              @foreach($levels as $level)
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="levels[]" value="{{ $level->id }}" id="level_{{ $level->id }}">
                                      <label class="form-check-label" for="level_{{ $level->id }}">
                                          {{ $level->name }}
                                      </label>
                                  </div>
                              @endforeach
                          </div>
                          @error('levels')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                      <br>


                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                            <br>
                            <div class="form-group row mb-0">
                              <div class="col-md-6 offset-md-4">
                               
                                  <button type="submit" class="btn btn-primary">
                                      {{ __('Créer') }}
                                  </button>
                                  <a class="btn btn-secondary" href="{{ route('offers.index') }}">
                                      {{ __('Annuler') }}
                                  </a>
                              </div>
                          </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

@endsection
