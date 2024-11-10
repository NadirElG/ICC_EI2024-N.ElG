@extends('coach.dashboard.layouts.master')

@section('content')

<section id="wsus__dashboard">
    <div class="container-fluid">
        @include('coach.dashboard.layouts.sidebar')
        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content mt-2 mt-md-0">
                    <h3><i class="fal fa-calendar-alt"></i> My Slots</h3>

                    <!-- Button to create a new slot -->
                    <div class="mb-3">
                        <a href="{{ route('coach.slots.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> Create New Slot
                        </a>
                    </div>

                    <div class="wsus__dashboard_review">
                        <div class="row">
                            @foreach ($slots as $slot)
                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_review_item">
                                        <div class="wsus__dash_rev_img">
                                        <img src="{{ asset($slot->image) }}" alt="{{ $slot->title }}" class="img-fluid w-100">
                                        </div>
                                        <div class="wsus__dash_rev_text">
                                            <h5>{{ $slot->title }} <span>{{ $slot->date instanceof \Carbon\Carbon ? $slot->date->format('M d, Y') : $slot->date }}</span></h5>
                                            <p>Capacity: {{ $slot->capacity }}</p>
                                            <p>Price: ${{ number_format($slot->price, 2) }}</p>
                                            <p>Status: <span class="badge bg-{{ $slot->status == 'open' ? 'success' : ($slot->status == 'in_progress' ? 'warning' : 'secondary') }}">{{ ucfirst($slot->status) }}</span></p>
                                            <ul>
                                                <li><a href="{{ route('coach.slots.edit', $slot->id) }}"><i class="fal fa-edit"></i> Edit</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Message if no slots are found -->
                        @if($slots->isEmpty())
                            <div class="alert alert-info mt-3">You have no slots created yet.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
