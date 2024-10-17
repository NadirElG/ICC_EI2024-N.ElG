@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Users and Wallet Balances</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>All Users and Wallets</h4>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module'])}}
@endpush
