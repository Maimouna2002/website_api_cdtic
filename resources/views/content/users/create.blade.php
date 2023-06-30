@extends('layouts.contentNavbarLayout')

@section('content')
<!-- Page Heading -->
<div class="card mb-4">
  <div class="card-body">
      <div class="d-sm-flex align-items-center justify-content-between">
          <h3 class="mb-0 bc-title"><b>{{ __('Créer un utilisateur') }}</b> </h3>
          <a class="btn btn-primary btn-sm" href="{{route('users.index')}}"><i class="bx bxs-chevron-left bx-xs"></i> {{ __('Retour') }}</a>
          </div>
  </div>
</div>
    <div class="container">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" id="confirm_password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Rôles</label>
                <select name="roles[]"  class="form-control">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Créer</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection
