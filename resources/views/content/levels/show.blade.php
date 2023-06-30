@extends('layouts.contentNavbarLayout')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Details') }}</div>

        <div class="card-body">
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" value="{{ $level->name }}" readonly>
                </div>
            </div>
            <br>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <a class="btn btn-secondary" href="{{ route('levels.index') }}">
                        {{ __('Retour') }}
                    </a>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
