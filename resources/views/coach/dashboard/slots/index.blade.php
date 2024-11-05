@extends('coach.dashboard.layouts.master')

@section('content')

<!--=============================
    DASHBOARD START
==============================-->
<section id="wsus__dashboard">
    <div class="container-fluid">
        @include('coach.dashboard.layouts.sidebar')
        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content mt-2 mt-md-0">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3><i class="fas fa-calendar-alt"></i> Slots</h3>
                        <a href="{{ route('coach.slots.create') }}" class="btn btn-primary">Créer un Slot</a>
                    </div>

                    <div class="wsus__dashboard_slots">
                        <div class="row">
                            @foreach($slots as $slot)
                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_review_item">
                                        <div class="wsus__dash_rev_text">
                                        <h5>{{ $slot->title }} <span>{{ \Carbon\Carbon::parse($slot->date)->format('d-m-Y') }}</span></h5>
                                        <p><i class="fas fa-info-circle"></i> {{ $slot->status == 'active' ? 'Actif' : 'Annulé' }}</p>
                                            <p><i class="fas fa-align-left"></i> Description : {{ $slot->description ?? 'Non spécifiée' }}</p>
                                            <p><i class="fas fa-clock"></i> Début : {{ $slot->start_time }} - Fin : {{ $slot->end_time }}</p>
                                            <p><i class="fas fa-map-marker-alt"></i> Lieu : {{ $slot->location ?? 'Non spécifié' }}</p>
                                            <p><i class="fas fa-user-friends"></i> Capacité : {{ $slot->capacity }}</p>
                                            <p><i class="fas fa-dollar-sign"></i> Prix : {{ number_format($slot->price, 2) }} €</p>
                                            <ul>
                                                <li><a href="" class="text-warning"><i class="fal fa-edit"></i> Modifier</a></li>
                                                <li>
                                                    <form action="">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-danger" style="background: none; border: none;">
                                                            <i class="far fa-trash-alt"></i> Supprimer
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=============================
    DASHBOARD END
==============================-->

@endsection
