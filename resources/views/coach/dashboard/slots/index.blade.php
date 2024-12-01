@extends('coach.dashboard.layouts.master')

@section('content')

<section id="wsus__dashboard">
    <div class="container-fluid">
        @include('coach.dashboard.layouts.sidebar')
        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content mt-2 mt-md-0">
                    <h3><i class="fal fa-calendar-alt"></i> Mes créneaux</h3>

                    <!-- Bouton pour créer un nouveau slot -->
                    <div class="mb-3">
                        <a href="{{ route('coach.slots.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> Créer un nouveau créneau
                        </a>
                    </div>

                    <!-- Créneaux groupés par statut -->
                    @foreach (['open' => 'Créneaux ouverts', 'in_progress' => 'Créneaux en cours', 'completed' => 'Créneaux terminés'] as $status => $title)
                        <div class="mb-4">
                            <h4>{{ $title }}</h4>
                            @if ($slots->where('status', $status)->isEmpty())
                                <div class="alert alert-info">Aucun {{ strtolower($title) }} pour l'instant.</div>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Titre</th>
                                                <th>Date</th>
                                                <th>Capacité</th>
                                                <th>Prix</th>
                                                <th>Statut</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($slots->where('status', $status) as $slot)
                                                <tr>
                                                    <td>{{ $slot->title }}</td>
                                                    <td>
                                                        {{ $slot->date instanceof \Carbon\Carbon ? $slot->date->format('d/m/Y') : $slot->date }}
                                                    </td>
                                                    <td>{{ $slot->capacity }}</td>
                                                    <td>{{ number_format($slot->price, 2) }} €</td>
                                                    <td>
                                                        <span class="badge bg-{{ $status == 'open' ? 'success' : ($status == 'in_progress' ? 'warning' : 'secondary') }}">
                                                            {{ ucfirst($title) }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('coach.slots.edit', $slot->id) }}" class="btn btn-warning btn-sm">
                                                            <i class="fas fa-edit"></i> Modifier
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
