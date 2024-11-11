@extends('frontend.layouts.master')

@section('content')
<section id="slot_details">
    <div class="container">
        <div class="slot-details-card">
        <img src="{{ asset($slot->image) }}" alt="{{ $slot->title }}" class="img-fluid w-20">
        <h2>{{ $slot->title }}</h2>
            <p>Date: {{ \Carbon\Carbon::parse($slot->date)->format('M d, Y') }}</p>
            <p>Start Time: {{ \Carbon\Carbon::parse($slot->start_time)->format('H:i') }}</p>
            <p>End Time: {{ \Carbon\Carbon::parse($slot->end_time)->format('H:i') }}</p>
            <p>Location: {{ $slot->location }}</p>
            <p>Capacity: {{ $slot->remainingSeats() }} seats left out of {{ $slot->capacity }}</p>
            <p>Price: ${{ number_format($slot->price, 2) }}</p>
            <p>{{ $slot->description }}</p>

            <!-- Bouton de réservation -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#reservationModal">
                Reserve Slot
            </button>
        </div>
    </div>
</section>

<!-- Modal de confirmation de réservation -->
<div class="modal fade" id="reservationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Reservation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to reserve this slot ? Your wallet will be deducted by ${{ number_format($slot->price, 2) }}.</p>
            </div>
            <div class="modal-footer">
            <form action="{{ route('slots.reserve', $slot->id) }}" method="POST">
    @csrf
    <input type="hidden" name="slot_id" value="{{ $slot->id }}">
    <button type="submit" class="btn btn-primary">Confirm</button>
</form>

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
@endsection
