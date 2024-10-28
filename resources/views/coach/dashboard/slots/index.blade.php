@extends('coach.dashboard.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Mes Slots</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Liste des Slots</h4>
                <div class="card-header-action">
                    <a href="{{ route('coach.slots.create') }}" class="btn btn-primary">
                        Créer un nouveau slot
                    </a>
                </div>
            </div>
            <div class="card-body">
                <!-- Affichage des messages de succès et d'erreur -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                {{ $dataTable->table() }}
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
