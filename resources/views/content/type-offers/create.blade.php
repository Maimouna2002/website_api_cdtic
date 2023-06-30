@extends('layouts.contentNavbarLayout')

@section('title', 'Types Offers - Create')


@section('content')

<!-- Page Heading -->
<div class="card mb-4">
  <div class="card-body">
      <div class="d-sm-flex align-items-center justify-content-between">
          <h3 class="mb-0 bc-title"><b>{{ __('Créer Un Type D Offre') }}</b> </h3>
          <a class="btn btn-primary btn-sm" href="{{route('type-offers.index')}}"><i class="bx bxs-chevron-left bx-xs"></i> {{ __('Retour') }}</a>
          </div>
  </div>
</div>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('type-offers.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <br>

                            <button type="submit" class="btn btn-primary">Créer</button>
                            <a href="{{ route('type-offers.index') }}" class="btn btn-secondary">Annuler</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
