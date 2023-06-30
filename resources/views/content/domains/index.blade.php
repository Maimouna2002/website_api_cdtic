@extends('layouts.contentNavbarLayout')

@section('title', ' Domain')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Listes des domaines</div>

                    <div class="card-body">
                        <a href="{{ route('domains.create') }}" class="btn btn-primary mb-3">Creér Domaine</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($domains as $domain)
                                    <tr>
                                        <th scope="row">{{ $domain->id }}</th>
                                        <td>{{ $domain->name }}</td>
                                        <td>{{ $domain->status }}</td>
                                        <td>
                                            <a href="{{ route('domains.show', $domain->id) }}" class="btn btn-primary">Voir</a>
                                            <a href="{{ route('domains.edit', $domain->id) }}" class="btn btn-secondary">Editer</a>
                                            <form action="{{ route('domains.destroy', $domain->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this domain?')">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
