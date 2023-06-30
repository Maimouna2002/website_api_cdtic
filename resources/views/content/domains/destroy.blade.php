@extends('layouts.contentNavbarLayout')

@section('title', 'destroy Offer')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Delete Domain</div>

                    <div class="card-body">
                        <p>Are you sure you want to delete this domain?</p>

                        <form method="POST" action="{{ route('domains.destroy', $domain->id) }}">
                            @method('DELETE')
                            @csrf

                            <button type="submit" class="btn btn-danger">Delete</button>
                            <a href="{{ route('domains.index') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
