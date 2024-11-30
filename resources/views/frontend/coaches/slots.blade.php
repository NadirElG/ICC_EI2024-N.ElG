@extends('frontend.layouts.master')

@section('content')
<section id="wsus__coach_details" style="margin-top: 30px;"> <!-- Ajout de la marge supérieure -->
    <div class="container">
        <div class="row">
            <!-- Informations sur le coach -->
            <div class="col-lg-12 mb-4">
                <div class="coach-details-header text-center">
                    <h2>{{ $coach->name }}</h2>
                    <p>{{ $coach->username }}</p>
                    <a href="mailto:{{ $coach->email }}" class="btn btn-primary">
                        <i class="fas fa-envelope"></i> {{ $coach->email }}
                    </a>
                </div>
            </div>

            <!-- Options d'affichage (Liste ou Carte) -->
            <div class="col-lg-12 mb-4">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-outline-secondary me-2 view-toggle" data-view="grid">
                        <i class="fas fa-th"></i> {{ \App\Helpers\TranslationHelper::translate('Vue en carte') }}
                    </button>
                    <button class="btn btn-outline-secondary view-toggle btn-primary" data-view="list">
                        <i class="fas fa-list"></i> {{ \App\Helpers\TranslationHelper::translate('Vue en liste') }}
                    </button>
                </div>
            </div>

            <!-- Slots du coach -->
            <div class="col-lg-12">
                <div id="slots-container" class="row">
                    @forelse($slots as $slot)
                        <!-- Vue Carte -->
                        <div class="col-xl-4 col-md-6 mb-4 slot-item d-none" data-view="grid">
                            <div class="wsus__coach_single text-center" style="background-color: #fff; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                                <img src="{{ $slot->image ?? '/uploads/default-slot.jpg' }}" 
                                     alt="{{ $slot->title }}" 
                                     class="img-fluid w-100"
                                     style="height: 200px; object-fit: cover; border-radius: 8px 8px 0 0;">
                                <div class="wsus__coach_text" style="padding: 15px;">
                                    <h4 style="color: #333;">{{ $slot->title }}</h4>
                                    <p style="color: #555; font-size: 14px;">
                                        <strong>{{ \App\Helpers\TranslationHelper::translate('Catégorie') }} :</strong> 
                                        {{ $slot->category->name ?? \App\Helpers\TranslationHelper::translate('Non spécifié') }}
                                    </p>
                                    <p style="color: #555; font-size: 14px;">
                                        <strong>{{ \App\Helpers\TranslationHelper::translate('Date') }} :</strong> 
                                        {{ \Carbon\Carbon::parse($slot->date)->format('d/m/Y') }}
                                    </p>
                                    <p style="color: #555; font-size: 14px;">
                                        <strong>{{ \App\Helpers\TranslationHelper::translate('Prix') }} :</strong>
                                        {{ number_format($slot->price, 2) }}€
                                    </p>
                                    <a href="{{ route('slots.details', $slot->id) }}" class="common_btn">
                                        {{ \App\Helpers\TranslationHelper::translate('Réserver') }}
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Vue Liste -->
                        <div class="col-12 mb-3 slot-item" data-view="list">
                            <div class="wsus__coach_single d-flex align-items-center" style="background-color: #fff; border: 1px solid #ddd; border-radius: 8px; padding: 15px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                                <img src="{{ $slot->image ?? '/uploads/default-slot.jpg' }}" 
                                     alt="{{ $slot->title }}" 
                                     class="img-fluid me-3" 
                                     style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px;">
                                <div class="wsus__coach_text text-start w-100">
                                    <h4 style="color: #333;">{{ $slot->title }}</h4>
                                    <p style="color: #555; font-size: 14px;">
                                        <strong>{{ \App\Helpers\TranslationHelper::translate('Catégorie') }} :</strong> 
                                        {{ $slot->category->name ?? \App\Helpers\TranslationHelper::translate('Non spécifié') }}
                                    </p>
                                    <p style="color: #555; font-size: 14px;">
                                        <strong>{{ \App\Helpers\TranslationHelper::translate('Date') }} :</strong> 
                                        {{ \Carbon\Carbon::parse($slot->date)->format('d/m/Y') }}
                                    </p>
                                    <p style="color: #555; font-size: 14px;">
                                        <strong>{{ \App\Helpers\TranslationHelper::translate('Prix') }} :</strong>
                                        {{ number_format($slot->price, 2) }}€
                                    </p>
                                    <a href="{{ route('slots.details', $slot->id) }}" class="common_btn">
                                        {{ \App\Helpers\TranslationHelper::translate('Réserver') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-dark">
                            {{ \App\Helpers\TranslationHelper::translate('Aucun slot disponible pour ce coach.') }}
                        </p>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $slots->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const viewButtons = document.querySelectorAll('.view-toggle');
        const slotsContainer = document.getElementById('slots-container');

        // Vue par défaut en liste
        const defaultView = 'list';
        document.querySelectorAll('.slot-item').forEach(item => {
            item.classList.toggle('d-none', item.getAttribute('data-view') !== defaultView);
        });
        viewButtons.forEach(button => {
            if (button.getAttribute('data-view') === defaultView) {
                button.classList.add('btn-primary');
            } else {
                button.classList.remove('btn-primary');
            }
        });

        viewButtons.forEach(button => {
            button.addEventListener('click', () => {
                const view = button.getAttribute('data-view');

                // Changer la classe des slots
                document.querySelectorAll('.slot-item').forEach(item => {
                    item.classList.toggle('d-none', item.getAttribute('data-view') !== view);
                });

                // Modifier les boutons actifs
                viewButtons.forEach(btn => btn.classList.remove('btn-primary'));
                button.classList.add('btn-primary');
            });
        });
    });
</script>
@endsection
