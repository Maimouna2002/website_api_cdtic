@extends('layouts/contentNavbarLayout')

@section('title', 'Offers - Offers-show')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Offer Details</div>

                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">ID</th>
                                    <td>{{ $offer->id }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Description</th>
                                    <td>{{ $offer->description }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Type Offre</th>
                                    <td>{{ $offer->typeOffer->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Domaine</th>
                                    <td>{{ $offer->domain->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Start Date</th>
                                    <td>{{ $offer->date_start }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Date Debut</th>
                                    <td>{{ $offer->date_end }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Places Disponibles</th>
                                    <td>{{ $offer->available_places }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Status</th>
                                    <td>{{ $offer->status }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Levels</th>
                                    <td>
                                        @foreach($offer->levels as $level)
                                            <span class="badge badge-primary">{{ $level->name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                      <br>
                        <a href="{{ route('offers.index', $offer->id) }}" class="btn btn-primary">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
