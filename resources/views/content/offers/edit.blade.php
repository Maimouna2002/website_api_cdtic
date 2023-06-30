@extends('layouts.contentNavbarLayout')

@section('title', 'Edit Offer')


@section('content')

<!-- Page Heading -->
<div class="card mb-4">
  <div class="card-body">
      <div class="d-sm-flex align-items-center justify-content-between">
          <h3 class="mb-0 bc-title"><b>{{ __('Mettre à jour Une Offre') }}</b> </h3>
          <a class="btn btn-primary btn-sm" href="{{route('offers.index')}}"><i class="bx bxs-chevron-left bx-xs"></i> {{ __('Retour') }}</a>
          </div>
  </div>
</div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('offers.update', $offer->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="domain_id">Domaine:</label>
                                <select name="domain_id" id="domain_id" class="form-control">
                                    @foreach($domains as $domain)
                                        <option value="{{ $domain->id }}" @if($domain->id === $offer->domain_id) selected @endif>{{ $domain->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="type_offer_id">Type D'Offre:</label>
                                <select name="type_offer_id" id="type_offer_id" class="form-control">
                                    @foreach($typeOffers as $typeOffer)
                                        <option value="{{ $typeOffer->id }}" @if($typeOffer->id === $offer->type_offer_id) selected @endif>{{ $typeOffer->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" id="description" class="form-control" rows="5">{{ $offer->description }}</textarea>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="date_start">Date Debut:</label>
                                <input type="date" name="date_start" id="date_start" class="form-control" value="{{ $offer->date_start }}">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="date_end">Date Fin:</label>
                                <input type="date" name="date_end" id="date_end" class="form-control" value="{{ $offer->date_end }}">
                            </div>

                            <div class="form-group">
                                <label for="available_places">Places disponibles:</label>
                                <input type="number" name="available_places" id="available_places" class="form-control" value="{{ $offer->available_places }}">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="levels">Niveau:</label>
                                <select name="levels[]" id="levels" class="form-control" multiple>
                                    @foreach($levels as $level)
                                        <option value="{{ $level->id }}" @if(in_array($level->id, $offer->levels->pluck('id')->toArray())) selected @endif>{{ $level->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="active" @if($offer->status === 'active') selected @endif>Active</option>
                                    <option value="inactive" @if($offer->status === 'inactive') selected @endif>Inactive</option>
                                </select>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
