@extends('coach.dashboard.layouts.master')

@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
        @include('coach.dashboard.layouts.sidebar')
        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content mt-2 mt-md-0">
                    <h3><i class="fal fa-money-bill-wave"></i> Demande de retrait</h3>

                    <form action="{{ route('coach.withdrawal.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="amount" class="form-label">Montant du retrait</label>
                            <input type="number" name="amount" id="amount" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="bank_account_number" class="form-label">Numéro de compte bancaire</label>
                            <input type="text" name="bank_account_number" id="bank_account_number" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Soumettre la demande</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
