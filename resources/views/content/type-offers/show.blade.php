@extends('layouts/contentNavbarLayout')

@section('title', 'Offers -Type-Offers-show')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Type Offer Details</div>

                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $typeOffer->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
