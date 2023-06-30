@extends('layouts.contentNavbarLayout')

@section('title', 'Offers - Index')

@section('content')

<!-- Start of Main Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-0 bc-title"><b>{{ __('Gestion Des Offres De Stage') }}</b></h3>
                @role('admin')
                <a class="btn btn-primary btn-sm" href="{{ route('offers.create') }}" title="{{ __('Créer Une Offre') }}"><i class="bx bxs-plus bx-xs"></i> {{ __('Ajouter') }}</a>
                @endrole
            </div>
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
                            <th>{{ __('Date Debut') }}</th>
                            <th>{{ __('Date Fin') }}</th>
                            @role('admin')
                            <th>{{ __('Status') }}</th>
                            @endrole

                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($offers as $offer)
                            <tr>
                                <td>{{ $offer->id }}</td>
                                <td>{{ $offer->domain->name }}</td>
                                <td>{{ $offer->typeOffer->name }}</td>
                                <td>
                                    @foreach ($offer->levels as $level)
                                        {{ $level->name }}
                                    @endforeach
                                </td>
                                <td>{{ $offer->available_places }}</td>
                                <td>{{ $offer->date_start }}</td>
                                <td>{{ $offer->date_end }}</td>
                                @role('admin')
                                <td>
                                  <div class="dropdown">
                                      <button class="btn btn-{{ $offer->status === 'active' ? 'success' : 'danger' }} dropdown-toggle" type="button" id="statusDropdown{{ $offer->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                          {{ $offer->status === 'active' ? 'Active' : 'Inactive' }}
                                      </button>
                                      <ul class="dropdown-menu" aria-labelledby="statusDropdown{{ $offer->id }}">
                                          <li>
                                              <a class="dropdown-item" href="{{ route('offers.status', ['id' => $offer->id, 'status' => 'active']) }}">Activer</a>
                                          </li>
                                          <li>
                                              <a class="dropdown-item" href="{{ route('offers.status', ['id' => $offer->id, 'status' => 'inactive']) }}">Désactiver</a>
                                          </li>
                                      </ul>
                                  </div>
                              </td>
                            @endrole


                              <td>
                                <div class="d-flex">
                                    <a href="{{ route('offers.show', $offer->id) }}" title="{{ __('Read the offer') }}" class="btn btn-primary btn-xs mr-2"><i class="bx bxs-show bx-xs"></i></a>
                                    <a href="{{ route('offers.edit', $offer->id) }}" title="{{ __('Edit the offer') }}" class="btn btn-warning btn-xs mr-2"><i class="bx bx-edit bx-xs"></i></a>
                                    <form method="POST" action="{{ route('offers.destroy', $offer) }}" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Etes vous sur de vouloir supprimer cette Offre?')"><i class="bx bx-trash bx-xs"></i></button>
                                    </form>
                                </div>
                            </td>



                            </tr>
                        @empty
                            <tr>
                                <td colspan="13">{{ __('Offre Non Disponible') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
