@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Process a Refund</h1>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h4>Refund Form</h4>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('admin.wallet-transactions.process-refund') }}" method="POST">
                @csrf

                <!-- User ID -->
                <div class="form-group">
                    <label for="user_id">User ID</label>
                    <input type="number" name="user_id" class="form-control" placeholder="Enter the User ID" required>
                </div>

                <!-- Refund Amount -->
                <div class="form-group">
                    <label for="amount">Refund Amount</label>
                    <input type="number" name="amount" class="form-control" step="0.01" placeholder="Enter the refund amount" required>
                </div>

                <!-- Submit Button -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Process Refund</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection