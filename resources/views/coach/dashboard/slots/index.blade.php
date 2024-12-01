@extends('coach.dashboard.layouts.master')

@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
        @include('coach.dashboard.layouts.sidebar')
        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content mt-2 mt-md-0">
                    <h3><i class="fal fa-calendar-alt"></i> Mes créneaux</h3>

                    <!-- Afficher un message de succès si le remboursement a été effectué -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

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
                                                <th>Réservations</th>
                                                <th>Prix</th>
                                                <th>Statut</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($slots->where('status', $status) as $slot)
                                                <tr>
                                                    <td>{{ $slot->title }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($slot->date)->format('d/m/Y') }}</td>
                                                    <td>{{ $slot->reservations()->count() }}/{{ $slot->capacity }}</td>
                                                    <td>{{ number_format($slot->price, 2) }} €</td>
                                                    <td>
                                                        <span class="badge bg-{{ $status == 'open' ? 'success' : ($status == 'in_progress' ? 'warning' : 'secondary') }}">
                                                            {{ ucfirst($title) }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <!-- Retirer le bouton Modifier pour les créneaux terminés -->
                                                        @if ($status !== 'completed')
                                                            <a href="{{ route('coach.slots.edit', $slot->id) }}" class="btn btn-warning btn-sm">
                                                                <i class="fas fa-edit"></i> Modifier
                                                            </a>
                                                        @endif

                                                        <!-- Afficher le bouton de remboursement seulement pour les créneaux "completed" et avec des réservations annulées -->
                                                        @if ($status === 'completed' && $slot->reservations()->where('status', 'canceled')->count() > 0 && !$slot->is_refunded)
                                                            <form action="{{ route('coach.slots.refund', $slot->id) }}" method="POST" style="display:inline;">
                                                                @csrf
                                                                <button class="btn btn-primary btn-sm">
                                                                    <i class="fas fa-undo"></i> Rembourser
                                                                </button>
                                                            </form>
                                                        @elseif ($status === 'open')
                                                            <!-- Bouton Annuler -->
                                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#cancelSlotModal-{{ $slot->id }}">
                                                                <i class="fas fa-times"></i> Annuler
                                                            </button>
                                                        @endif
                                                    </td>
                                                </tr>

                                                <!-- Modal pour annuler le slot -->
                                                <div class="modal fade" id="cancelSlotModal-{{ $slot->id }}" tabindex="-1" aria-labelledby="cancelSlotModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="cancelSlotModalLabel">Annuler le créneau : {{ $slot->title }}</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('coach.slots.cancel', $slot->id) }}" method="POST">
                                                                    @csrf
                                                                    <div class="mb-3">
                                                                        <label for="reason" class="form-label">Raison de l'annulation</label>
                                                                        <textarea name="reason" id="reason" class="form-control" rows="4" required></textarea>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-danger">Confirmer l'annulation</button>
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
