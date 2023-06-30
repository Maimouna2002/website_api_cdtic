@extends('layouts.contentNavbarLayout')
<!-- resources/views/permissions/create.blade.php -->

@section('content')
    <div class="container">
        <h1>Créer une Permission</h1>

        <form action="{{ route('permissions.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <br>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Créer</button>
            <a class="btn btn-secondary" href="{{ route('permissions.index') }}">
              {{ __('Annuler') }}
          </a>
        </form>
    </div>
@endsection
