@extends('layouts.contentNavbarLayout')

@section('title', ' Domain')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Domain Details</div>

                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $domain->name }}</p>
                        <p><strong>Status:</strong> {{ $domain->status }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<p><a href="{{ route('domains.index') }}" title="Retourner aux domains" >Back to Domains List</a></p>

@endsection
