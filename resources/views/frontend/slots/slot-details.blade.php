@extends('frontend.layouts.master')

@section('content')
<section id="slot_details">
    <div class="container">
        <!-- Afficher la catégorie ou la recherche si applicable -->
        @if(request()->has('search'))
            <h5>{{ \App\Helpers\TranslationHelper::translate('Search') }}: {{ \App\Helpers\TranslationHelper::translate(request()->search) }}</h5>
            <hr>
        @elseif(request()->has('category'))
            <h5>{{ \App\Helpers\TranslationHelper::translate('Category') }}: {{ \App\Helpers\TranslationHelper::translate(request()->category) }}</h5>
            <hr>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Carte Bootstrap avec marge supérieure -->
                <div class="card mb-4 mt-4 text-center">
                    <!-- Image de la carte -->
                    @if($slot->image)
                    <img src="{{ asset($slot->image) }}" alt="{{ $slot->title }}" class="img-fluid mx-auto mt-3" style="max-width: 300px;">
                    @endif
                    <div class="card-body">
                        <!-- Titre du créneau -->
                        <h2 class="card-title">{{ \App\Helpers\TranslationHelper::translate($slot->title) }}</h2>

                        <!-- Sous-titre : nom du coach -->
                        <h5 class="card-subtitle mb-2 text-muted">
                            {{ \App\Helpers\TranslationHelper::translate('Coach') }}: {{ $slot->coach->username }}
                        </h5>

                        <!-- Détails du créneau avec traduction -->
                        <p class="card-text"><strong>{{ \App\Helpers\TranslationHelper::translate('Date') }} :</strong> {{ \Carbon\Carbon::parse($slot->date)->format('d M Y') }}</p>
                        <p class="card-text"><strong>{{ \App\Helpers\TranslationHelper::translate('Start Time') }} :</strong> {{ \Carbon\Carbon::parse($slot->start_time)->format('H:i') }}</p>
                        <p class="card-text"><strong>{{ \App\Helpers\TranslationHelper::translate('End Time') }} :</strong> {{ \Carbon\Carbon::parse($slot->end_time)->format('H:i') }}</p>
                        <p class="card-text"><strong>{{ \App\Helpers\TranslationHelper::translate('Location') }} :</strong> {{ \App\Helpers\TranslationHelper::translate($slot->location) }}</p>
                        <p class="card-text"><strong>{{ \App\Helpers\TranslationHelper::translate('Capacity') }} :</strong> {{ $slot->remainingSeats() }} {{ \App\Helpers\TranslationHelper::translate('seats left out of') }} {{ $slot->capacity }}</p>
                        <p class="card-text"><strong>{{ \App\Helpers\TranslationHelper::translate('Price') }} :</strong> ${{ number_format($slot->price, 2) }}</p>
                        <p class="card-text">{{ \App\Helpers\TranslationHelper::translate($slot->description) }}</p>

                        <!-- Liste horizontale des utilisateurs ayant réservé ce créneau -->
                        <div class="reserved-users mt-4">
                            <h5>{{ \App\Helpers\TranslationHelper::translate('Users who have reserved this slot') }}:</h5>
                            @if($slot->reservations->isEmpty())
                                <p>{{ \App\Helpers\TranslationHelper::translate('No reservations yet') }}</p>
                            @else
                                <ul class="list-inline">
                                    @foreach($slot->reservations as $reservation)
                                        <li class="list-inline-item">
                                            <span class="badge badge-primary">{{ $reservation->user->username }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>

                        <!-- Bouton de réservation -->
                        <button type="button" class="btn btn-success mt-3" data-toggle="modal" data-target="#reservationModal">
                            {{ \App\Helpers\TranslationHelper::translate('Reserve Slot') }}
                        </button>
                    </div>
                </div>
                <!-- Fin de la carte -->
            </div>
        </div>
    </div>
</section>

<!-- Modal de confirmation de réservation -->
<div class="modal fade" id="reservationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>{{ \App\Helpers\TranslationHelper::translate('Confirm Reservation') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="{{ \App\Helpers\TranslationHelper::translate('Close') }}">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    {{ \App\Helpers\TranslationHelper::translate('Are you sure you want to reserve this slot? Your wallet will be deducted by') }} ${{ number_format($slot->price, 2) }}.
                </p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('slots.reserve', $slot->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="slot_id" value="{{ $slot->id }}">
                    <button type="submit" class="btn btn-primary">{{ \App\Helpers\TranslationHelper::translate('Confirm') }}</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ \App\Helpers\TranslationHelper::translate('Cancel') }}</button>
            </div>
        </div>
    </div>
</div>
@endsection
