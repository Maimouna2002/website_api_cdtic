@extends('layouts.contentNavbarLayout')


@section('content')
    <div class="container">
        <h1>Modifier le rôle</h1>
        <form action="{{ route('roles.update', $role) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nom du rôle</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $role->name }}" required>
            </div>
            <div class="mb-3">
                <label for="display_name" class="form-label">Nom affiché</label>
                <input type="text" name="display_name" id="display_name" class="form-control" value="{{ $role->display_name }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="3">{{ $role->description }}</textarea>
            </div>
            <div class="mb-3">
                <label>Permissions</label>
                <div>
                    @foreach ($permissions as $permission)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}" {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                            <label class="form-check-label">{{ $permission->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection
