@extends('layouts.contentNavbarLayout')

@section('title', 'Offers - Index')

@section('content')
<!-- Start of Main Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body d-flex align-items-center justify-content-between">
            <h3 class="mb-0 bc-title">{{ __('Gestion Des Offres De Stage') }}</h3>
            <a class="btn btn-primary" href="{{ route('offers.create') }}" title="{{ __('Créer Une Offre') }}"><i class="bx bx-plus"></i></a>
        </div>
    </div>
    <div class="card shadow mb-6">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="admin-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{ __('Domaine') }}</th>
                            <th>{{ __('Type Offre') }}</th>
                            <th>{{ __('Niveau') }}</th>
                            <th>{{ __('Places disponibles') }}</th>
                            <th>{{ __('Période') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($offers as $offer)
                            <tr>
                                <td>{{ $offer->id }}</td>
                                <td>{{ $offer->domain->name }}</td>
                                <td>{{ $offer->typeOffer->name }}</td>
                                <td>{{ $offer->levels->implode('name', ', ') }}</td>
                                <td>{{ $offer->available_places }}</td>
                                <td>{{ (new DateTime($offer->date_start))->format('d/m/Y') }} - {{ (new DateTime($offer->date_end))->format('d/m/Y') }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-{{ $offer->status === 'active' ? 'success' : 'danger' }} dropdown-toggle" type="button" id="statusDropdown{{ $offer->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                            {{ $offer->status === 'active' ? __('Active') : __('Inactive') }}
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="statusDropdown{{ $offer->id }}">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('offers.status', ['id' => $offer->id, 'status' => 'active']) }}">{{ __('Activer') }}</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('offers.status', ['id' => $offer->id, 'status' => 'inactive']) }}">{{ __('Désactiver') }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                                <td>
                                  <div class="d-flex">
                                      <a href="{{ route('offers.show', $offer->id) }}" title="{{ __('Lire l\'offre') }}" class="btn btn-primary me-2"><i class="bx bx-show""></i></a>
                                      <a href="{{ route('offers.edit', $offer->id) }}" title="{{ __('Modifier l\'offre') }}" class="btn btn-warning me-2"><i class="bx bx-edit""></i></a>
                                      <form method="POST" action="{{ route('offers.destroy', $offer) }}" class="d-inline">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger" onclick="return confirm('{{ __('Êtes-vous sûr de vouloir supprimer cette offre?') }}')"><i class="bx bx-trash"></i></button>
                                      </form>
                                  </div>
                              </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">{{ __('Offre non disponible') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
@endsection
