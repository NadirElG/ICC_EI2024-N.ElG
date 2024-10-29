@extends('coach.dashboard.layouts.master')

@section('content')
    
<section class="section">
        <div class="section-header">
            <h1>Slots</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>All Category</h4>
                <div class="card-header-action">
                    <a href="{{ route('coach.slots.create') }}" class="btn btn-primary">
                    Create new
                    </a>
                </div>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
