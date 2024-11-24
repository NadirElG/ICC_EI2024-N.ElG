@extends('frontend.layouts.master')

@section('content')
<style>
    .slot-container {
        display: flex;
        flex-wrap: wrap;
        margin-left: -10px;
        margin-right: -10px;
    }
    .slot-card {
        flex: 1 1 25%;
        max-width: 25%;
        padding: 10px;
        box-sizing: border-box;
    }
    @media (max-width: 1200px) {
        .slot-card {
            flex: 1 1 33.3333%;
            max-width: 33.3333%;
        }
    }
    @media (max-width: 992px) {
        .slot-card {
            flex: 1 1 50%;
            max-width: 50%;
        }
    }
    @media (max-width: 768px) {
        .slot-card {
            flex: 1 1 100%;
            max-width: 100%;
        }
    }
    .card-img-top {
        height: 150px; /* Augmentation de la hauteur de l'image */
        object-fit: cover;
    }
</style>
<section id="available_slots">
    <div class="container mt-4">
        <h2>{{ \App\Helpers\TranslationHelper::translate('Available Slots') }}</h2>
        <div class="slot-container">
            @foreach ($slots as $slot)
                <div class="slot-card">
                    <div class="card h-100">
                        @if($slot->image)
                            <img src="{{ asset($slot->image) }}" alt="{{ \App\Helpers\TranslationHelper::translate($slot->title) }}" class="card-img-top">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ \App\Helpers\TranslationHelper::translate($slot->title) }}</h5>
                            <p class="card-text">{{ \App\Helpers\TranslationHelper::translate('Date') }} : {{ \Carbon\Carbon::parse($slot->date)->format('d M Y') }}</p>
                            <p class="card-text">{{ \App\Helpers\TranslationHelper::translate('Price') }} : {{ number_format($slot->price, 2) }} €</p>
                            <p class="card-text">{{ \App\Helpers\TranslationHelper::translate('Capacity') }} : {{ $slot->capacity - $slot->reservations_count }} {{ \App\Helpers\TranslationHelper::translate('seats left') }}</p>
                            <a href="{{ route('slots.slot-details', $slot->id) }}" class="btn btn-primary">{{ \App\Helpers\TranslationHelper::translate('View Details') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination personnalisée -->
        <div id="pagination" class="mt-4">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <!-- Bouton Précédent -->
                    @if (!$slots->onFirstPage())
                        <li class="page-item">
                            <a class="page-link" href="{{ $slots->previousPageUrl() }}" aria-label="{{ \App\Helpers\TranslationHelper::translate('Previous') }}">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        </li>
                    @endif

                    <!-- Numéros de page limités -->
                    @php
                        $start = max($slots->currentPage() - 2, 1);
                        $end = min($slots->currentPage() + 2, $slots->lastPage());
                    @endphp

                    @for ($page = $start; $page <= $end; $page++)
                        <li class="page-item {{ $page == $slots->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $slots->url($page) }}">{{ $page }}</a>
                        </li>
                    @endfor

                    <!-- Bouton Suivant -->
                    @if ($slots->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $slots->nextPageUrl() }}" aria-label="{{ \App\Helpers\TranslationHelper::translate('Next') }}">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</section>
@endsection
