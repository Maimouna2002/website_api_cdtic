@extends('layouts.contentNavbarLayout')

@section('title', 'Edit Type Offer')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editer les Type d'Offres</div>

                    <div class="card-body">
                        <form action="{{ route('type-offers.update', $typeOffer->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $typeOffer->name }}" required>
                            </div>
                          <br>

                            <button type="submit" class="btn btn-primary">mettre à jour</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
