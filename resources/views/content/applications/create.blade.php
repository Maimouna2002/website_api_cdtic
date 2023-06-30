@extends('layouts/contentNavbarLayout')


@section('content')
    <div class="container">
        <h1>Ajouter une Candidatures</h1>
        <form action="{{ route('applications.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="user_id">Utilisateur</label>
                <select name="user_id" id="user_id" class="form-control">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="offer_id">Offre</label>
                <select name="offer_id" id="offer_id" class="form-control">
                    @foreach ($offers as $offer)
                        <option value="{{ $offer->id }}">{{ $offer->description }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="motivation_letter">Lettre de motivation</label>
                <input type="file" name="motivation_letter" id="motivation_letter" class="form-control">
            </div>
            <div class="form-group">
                <label for="cv">CV</label>
                <input type="file" name="cv" id="cv" class="form-control">
            </div>
            <div class="form-group">
                <label for="status">Statut</label>
                <select name="status" id="status" class="form-control">
                    <option value="active">Actif</option>
                    <option value="inactive">Inactif</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
@endsection
