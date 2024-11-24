@extends('frontend.layouts.master')

@push('styles')
    <!-- Styles personnalisés pour la page des plans -->
    <style>
        .custom-pricing-page {
            background-color: #e0f7fa;
            font-family: 'Arial', sans-serif;
            min-height: 100vh;
            padding: 50px 0;
        }
        .custom-pricing-table {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 200px); /* Ajustement pour tenir compte du header et du footer */
        }
        .custom-card {
            border-radius: 20px;
            padding: 30px;
            margin: 0 15px;
            text-align: center;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .custom-card:hover {
            transform: scale(1.05);
        }
        .custom-basic {
            background-color: #ffffff;
            color: #000000;
        }
        .custom-standard {
            background-color: #4a90e2;
            color: #ffffff;
        }
        .custom-premium {
            background-color: #1c3d72;
            color: #ffffff;
        }
        .custom-price {
            font-size: 48px;
            font-weight: bold;
        }
        .custom-price small {
            font-size: 24px;
            font-weight: normal;
        }
        .custom-yearly {
            font-size: 16px;
            color: #888888;
        }
        .custom-features {
            margin: 20px 0;
            text-align: left;
        }
        .custom-features div {
            margin: 10px 0;
        }
        .custom-btn {
            border-radius: 50px;
            padding: 10px 30px;
            font-size: 16px;
            font-weight: bold;
        }
        .custom-btn-basic {
            background-color: #4a90e2;
            color: #ffffff;
        }
        .custom-btn-standard {
            background-color: #ffffff;
            color: #4a90e2;
            border: 2px solid #ffffff;
        }
        .custom-btn-premium {
            background-color: #4a90e2;
            color: #ffffff;
        }
    </style>
@endpush

@section('content')
    <div class="custom-pricing-page">
        <div class="custom-pricing-table">
            <!-- Plan de recharge à 10€ -->
            <div class="custom-card custom-basic">
                <h3>RECHARGE 10€</h3>
                <div class="custom-price">10€</div>
                <div class="custom-features">
                    <div>Montant crédité : 10€</div>
                    <div>Frais de transaction : 1%</div>
                </div>
                <form action="{{ route('stripe.payment') }}" method="post">
                    @csrf
                    <input type="hidden" name="amount" value="10">
                    <button type="submit" class="custom-btn custom-btn-basic">CHARGER 10€</button>
                </form>
            </div>

            <!-- Plan de recharge à 50€ -->
            <div class="custom-card custom-standard">
                <h3>RECHARGE 50€</h3>
                <div class="custom-price">50€</div>
                <div class="custom-features">
                    <div>Montant crédité : 50€</div>
                    <div>Bonus : +5€ offert</div>
                    <div>Frais de transaction : 0.8%</div>
                </div>
                <form action="{{ route('stripe.payment') }}" method="post">
                    @csrf
                    <input type="hidden" name="amount" value="50">
                    <button type="submit" class="custom-btn custom-btn-standard">CHARGER 50€</button>
                </form>
            </div>

            <!-- Plan de recharge à 100€ -->
            <div class="custom-card custom-premium">
                <h3>RECHARGE 100€</h3>
                <div class="custom-price">100€</div>
                <div class="custom-features">
                    <div>Montant crédité : 100€</div>
                    <div>Bonus : +15€ offert</div>
                    <div>Frais de transaction : 0.5%</div>
                </div>
                <form action="{{ route('stripe.payment') }}" method="post">
                    @csrf
                    <input type="hidden" name="amount" value="100">
                    <button type="submit" class="custom-btn custom-btn-premium">CHARGER 100€</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Scripts supplémentaires si nécessaire -->
@endpush
