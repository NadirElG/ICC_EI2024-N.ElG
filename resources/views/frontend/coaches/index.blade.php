@extends('frontend.layouts.master')

@section('content')
<section id="wsus__product_page" class="wsus__vendors">
    <div class="container">
        <div class="row">
            <!-- Barre de recherche -->
            <div class="col-xl-12 text-end mb-4">
                <form method="GET" action="{{ route('coaches.index') }}" class="d-inline-block">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="{{ \App\Helpers\TranslationHelper::translate('Rechercher...') }}" value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>

            <!-- Liste des coachs -->
            <div class="col-xl-12">
                <div class="row">
                    @forelse($coaches as $coach)
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="wsus__vendor_single">
                                <img src="{{ $coach->image ?? '/uploads/default-coach.jpg' }}" alt="{{ $coach->name }}" class="img-fluid w-100">
                                <div class="wsus__vendor_text">
                                    <div class="wsus__vendor_text_center">
                                        <h4>{{ $coach->name }}</h4>
                                        <p>{{ $coach->username }}</p>
                                        <a href="mailto:{{ $coach->email }}"><i class="fal fa-envelope"></i> {{ $coach->email }}</a>
                                        <a href="{{ route('coaches.slots', ['id' => $coach->id]) }}" class="common_btn">
                                            {{ \App\Helpers\TranslationHelper::translate('Consulter SLOT') }}
                                        </a>                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">{{ \App\Helpers\TranslationHelper::translate('Aucun coach trouvé.') }}</p>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $coaches->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
