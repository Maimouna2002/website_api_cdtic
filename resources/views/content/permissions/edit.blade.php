<!-- resources/views/permissions/edit.blade.php -->

@extends('layouts.contentNavbarLayout')


@section('content')
    <div class="container">
        <h1>Edit Permission</h1>

        <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $permission->name }}" required>
            </div>
            <br>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" required>{{ $permission->description }}</textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a class="btn btn-secondary" href="{{ route('permissions.index') }}">
              {{ __('Annuler') }}
          </a>
        </form>
    </div>
@endsection
