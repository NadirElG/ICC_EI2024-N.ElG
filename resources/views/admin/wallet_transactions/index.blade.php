@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Wallet Transactions</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>All Transactions</h4>
            </div>
            <div class="card-body">
                <!-- DataTable integration -->
                {{ $dataTable->table() }}
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <!-- Include the DataTable scripts -->
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush