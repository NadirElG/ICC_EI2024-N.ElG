@extends('frontend.layouts.master')

@section('content')
<section id="available_slots">
    <div class="container">
        <h2>Available Slots</h2>
        <div class="row">
            @foreach ($slots as $slot)
                <div class="col-md-4 mb-4">
                    <div class="card">
                    <img src="{{ asset($slot->image) }}" alt="{{ $slot->title }}" class="img-fluid w-100">
                    <div class="card-body">
                            <h5 class="card-title">{{ $slot->title }}</h5>
                            <p class="card-text">Date: {{ \Carbon\Carbon::parse($slot->date)->format('M d, Y') }}</p>
                            <p class="card-text">Price: ${{ number_format($slot->price, 2) }}</p>
                            <p class="card-text">Capacity: {{ $slot->capacity }} seats left</p>
                            <a href="{{ route('slots.slot-details', $slot->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
