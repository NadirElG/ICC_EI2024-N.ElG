@extends('frontend.dashboard.layouts.master')

@section('content')

    <section id="wsus__dashboard">
    <div class="container-fluid">
        @include('frontend.dashboard.layouts.sidebar')
      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content">
            <div class="wsus__dashboard">
              <div class="row">
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item red" href="dsahboard_order.html">
                    <i class="far fa-address-book"></i>
                    <p>order</p>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item green" href="dsahboard_download.html">
                    <i class="fal fa-cloud-download"></i>
                    <p>download</p>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item sky" href="dsahboard_review.html">
                    <i class="fas fa-star"></i>
                    <p>review</p>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item blue" href="dsahboard_wishlist.html">
                    <i class="far fa-heart"></i>
                    <p>wishlist</p>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item orange" href="dsahboard_profile.html">
                    <i class="fas fa-user-shield"></i>
                    <p>profile</p>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item purple" href="dsahboard_address.html">
                    <i class="fal fa-map-marker-alt"></i>
                    <p>address</p>
                  </a>
                </div>
              </div>
              <div class="row">
              <div class="col-xl-12">
    <div class="wsus__message">
        <h4>Vos réservations</h4>
        @if ($reservations->isEmpty())
            <p>Toujours pas de slots réservés ? <a href="{{ route('slots.index') }}">Voir les slots disponibles</a></p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nom du slot</th>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>Statut</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->slot->title }}</td>
                            <td>{{ \Carbon\Carbon::parse($reservation->slot->date)->format('d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($reservation->slot->start_time)->format('H:i') }}</td>
                            <td>
    @if ($reservation->status === 'reserved')
        <!-- Bouton "Reserved" -->
        <a href="{{ route('slots.slot-details', $reservation->slot->id) }}" class="btn btn-primary btn-sm mt-2">
            Reserved
        </a>
    @elseif ($reservation->status === 'completed')
        <!-- Bouton "Completed" -->
        <a href="{{ route('slots.slot-details', $reservation->slot->id) }}" class="btn btn-success btn-sm mt-2">
            Completed
        </a>
    @else
        <!-- Bouton "Cancelled" -->
        <a href="{{ route('slots.slot-details', $reservation->slot->id) }}" class="btn btn-danger btn-sm mt-2">
            Cancelled
        </a>
    @endif
</td>


                            <td>
                            @if (\Carbon\Carbon::parse($reservation->slot->date)->diffInHours(now()) < 48)
                            <button class="btn btn-secondary" disabled
                                        data-bs-toggle="modal" data-bs-target="#cannotCancelModal">
                                        Annuler
                                    </button>
                                @else
                                    <form action="#" method="POST">
                                        @csrf
                                        <button class="btn btn-danger">Annuler</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

<!-- Modal pour annulation impossible -->
<div class="modal fade" id="cannotCancelModal" tabindex="-1" aria-labelledby="cannotCancelModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cannotCancelModalLabel">Annulation impossible</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Vous ne pouvez pas annuler une réservation dans les 24 heures avant le début du slot. Veuillez contacter le service client si nécessaire.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection