@extends('layouts.contentNavbarLayout')

@section('title', 'Levels - Levels Index')

@section('content')

<!-- Start of Main Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <!-- Lien pour créer un nouveau niveau : "levels.create" -->
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-0 bc-title"><b>{{ __('Manage Levels') }}</b></h3>
                <a class="btn btn-primary btn-sm" href="{{ route('levels.create') }}" title="{{ __('Create a level') }}"><i class="fas fa-plus"></i> {{ __('Add') }}</a>
            </div>
        </div>
    </div>
    <div class="card shadow mb-6">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="admin-table">
                    <thead>
                        <tr>
                            <th>{{ __('Id') }}</th>
                            <th>{{ __('Niveau') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- On parcourt la collection de niveaux -->
                        @forelse ($levels as $level)
                            <tr>
                                <td>{{ $level->id }}</td>
                                <td>{{ $level->name }}</td>
                                <td>
                                    <!-- Lien pour afficher un niveau : "levels.show" -->
                                    <a href="{{ route('levels.show', $level) }}" title="{{ __('Read the level') }}" class="btn btn-primary"><i class="bx bxs-show bx-xs"></i></a>

                                    <!-- Lien pour modifier un niveau : "levels.edit" -->
                                    <a href="{{ route('levels.edit', $level) }}" title="{{ __('Edit the level') }}" class="btn btn-primary"><i class="bx bxs-edit bx-xs"></i></a>

                                    <!-- Formulaire pour supprimer un niveau : "levels.destroy" -->
                                    <form method="POST" action="{{ route('levels.destroy', $level) }}" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="bx bxs-trash bx-xs"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">{{ __('No levels available') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
