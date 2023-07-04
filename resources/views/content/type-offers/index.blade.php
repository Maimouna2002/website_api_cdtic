@extends('layouts.contentNavbarLayout')

@section('title', 'Types Offer Index')


@section('content')
 <!-- Page Heading -->
 <div class="card mb-4">
  <div class="card-body">
      <div class="d-sm-flex align-items-center justify-content-between">
          <h3 class="mb-0 bc-title"><b>{{ __('Liste Des Types D Offres') }}</b></h3>
          <a class="btn btn-primary btn-sm" href="{{ route('type-offers.create') }}" title="{{ __('Créer Un Type D Offre') }}"><i class="bx bxs-plus bx-xs"></i> {{ __('Ajouter') }}</a>
      </div>
  </div>
</div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($typeOffers as $typeOffer)
                                    <tr>
                                        <th scope="row">{{ $typeOffer->id }}</th>
                                        <td>{{ $typeOffer->name }}</td>
                                        <td>
                                            <a href="{{ route('type-offers.show', $typeOffer->id) }}" class="btn btn-primary"><i class="bx bxs-show bx-xs"></i></a>
                                            <a href="{{ route('type-offers.edit', $typeOffer->id) }}" class="btn btn-secondary"><i class="bx bxs-edit bx-xs"></i></a>
                                            <form action="{{ route('type-offers.destroy', $typeOffer->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this type offer?')"><i class="bx bxs-trash bx-xs"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
