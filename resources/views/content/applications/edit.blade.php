@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')
    <div class="container">
        <h1>Modifier l'application</h1>
        <form action="{{ route('applications.update', $application->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="user_id">Utilisateur</label>
                <select name="user_id" id="user_id" class="form-control">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id === $application->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="offer_id">Offre</label>
                <select name="offer_id" id="offer_id" class="form-control">
                    @foreach ($offers as $offer)
                        <option value="{{ $offer->id }}" {{ $offer->id === $application->offer_id ? 'selected' : '' }}>{{ $offer->description }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="motivation_letter">Lettre de motivation</label>
                <textarea name="motivation_letter" id="motivation_letter" class="form-control">{{ $application->motivation_letter }}</textarea>
            </div>
            <div class="form-group">
                <label for="cv">CV</label>
                <input type="file" name="cv" id="cv" class="form-control">
            </div>
            <div class="form-group">
                <label for="status">Statut</label>
                <select name="status" id="status" class="form-control">
                    <option value="active" {{ $application->status === 'active' ? 'selected' : '' }}>Actif</option>
                    <option value="inactive" {{ $application->status === 'inactive' ? 'selected' : '' }}>Inactif</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
@endsection



@section('content')
@endsection
