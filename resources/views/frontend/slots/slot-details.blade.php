@extends('frontend.layouts.master')

@section('content')
<section id="slot_details">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="slot-details-card text-center p-4" style="border: 1px solid #ddd; border-radius: 10px; max-width: 600px; background: #f9f9f9;">
            <!-- Image -->
            <img src="{{ asset($slot->image) }}" alt="{{ $slot->title }}" class="img-fluid mb-4" style="max-width: 80%; border-radius: 10px;">

            <!-- Slot Details -->
            <h2 class="mb-3">{{ $slot->title }}</h2>
            <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($slot->date)->format('M d, Y') }}</p>
            <p><strong>Start Time:</strong> {{ \Carbon\Carbon::parse($slot->start_time)->format('H:i') }}</p>
            <p><strong>End Time:</strong> {{ \Carbon\Carbon::parse($slot->end_time)->format('H:i') }}</p>
            <p><strong>Location:</strong> {{ $slot->location }}</p>
            <p><strong>Capacity:</strong> {{ $slot->remainingSeats() }} seats left out of {{ $slot->capacity }}</p>
            <p><strong>Price:</strong> ${{ number_format($slot->price, 2) }}</p>
            <p>{{ $slot->description }}</p>

            <!-- Reserve Button -->
            <button type="button" class="btn btn-success mt-4" data-bs-toggle="modal" data-bs-target="#reservationModal">
                Reserve Slot
            </button>
        </div>
    </div>
</section>

<!-- Reservation Confirmation Modal -->
<div class="modal fade" id="reservationModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Reservation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to reserve this slot? Your wallet will be deducted by ${{ number_format($slot->price, 2) }}.</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('slots.reserve', $slot->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="slot_id" value="{{ $slot->id }}">
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

@endsection
