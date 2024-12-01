@extends('frontend.layouts.master')

@section('content')
<section id="details_du_slot">
    <div class="container" style="min-height: 100vh;">
        <!-- Carte de Détails du Slot -->
        <div class="carte-details-slot text-center p-4 mx-auto" style="margin-top: 30px; border: 1px solid #ddd; border-radius: 10px; max-width: 600px; background: #f9f9f9;">
            <!-- Image -->
            <img src="{{ asset($slot->image) }}" alt="{{ $slot->title }}" class="img-fluid mb-4" style="max-width: 80%; border-radius: 10px;">

            <!-- Détails du Slot -->
            <h2 class="mb-3">{{ $slot->title }}</h2>
            <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($slot->date)->format('d/m/Y') }}</p>
            <p><strong>Heure de Début :</strong> {{ \Carbon\Carbon::parse($slot->start_time)->format('H:i') }}</p>
            <p><strong>Heure de Fin :</strong> {{ \Carbon\Carbon::parse($slot->end_time)->format('H:i') }}</p>
            <p><strong>Lieu :</strong> {{ $slot->location }}</p>
            <p><strong>Capacité :</strong> {{ $slot->remainingSeats() }} places restantes sur {{ $slot->capacity }}</p>
            <p><strong>Prix :</strong> {{ number_format($slot->price, 2) }} €</p>
            <p>{{ $slot->description }}</p>

            <!-- Bouton Réserver -->
            <button type="button" class="btn btn-success mt-4" data-bs-toggle="modal" data-bs-target="#reservationModal">
                Réserver ce Slot
            </button>
        </div>

        <!-- Utilisateurs avec Réservations -->
        <div class="reservations mt-5 text-center">
            <h4 class="mb-4">Utilisateurs ayant réservé</h4>
            @if($slot->reservations->isEmpty())
                <p class="text-muted">Aucune réservation pour ce slot.</p>
            @else
                <ul class="list-group d-inline-block" style="width: 300px;">
                    @foreach ($slot->reservations as $reservation)
                        <li class="list-group-item text-center">{{ $reservation->user->name }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</section>

<!-- Modal de Confirmation de Réservation -->
<div class="modal fade" id="reservationModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmer la Réservation</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Fermer">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Êtes-vous sûr de vouloir réserver ce slot ? {{ number_format($slot->price, 2) }} € seront déduits de votre portefeuille.</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('slots.reserve', $slot->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="slot_id" value="{{ $slot->id }}">
                    <button type="submit" class="btn btn-primary">Confirmer</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>
@endsection
