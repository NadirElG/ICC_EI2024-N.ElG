<html>
<head>
    <title>Pricing Plans</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #e0f7fa;
            font-family: 'Arial', sans-serif;
        }
        .pricing-table {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            border-radius: 20px;
            padding: 30px;
            margin: 0 15px;
            text-align: center;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card.basic {
            background-color: #ffffff;
            color: #000000;
        }
        .card.standard {
            background-color: #4a90e2;
            color: #ffffff;
        }
        .card.premium {
            background-color: #1c3d72;
            color: #ffffff;
        }
        .price {
            font-size: 48px;
            font-weight: bold;
        }
        .price small {
            font-size: 24px;
            font-weight: normal;
        }
        .yearly {
            font-size: 16px;
            color: #888888;
        }
        .features {
            margin: 20px 0;
            text-align: left;
        }
        .features div {
            margin: 10px 0;
        }
        .btn-custom {
            border-radius: 50px;
            padding: 10px 30px;
            font-size: 16px;
            font-weight: bold;
        }
        .btn-basic {
            background-color: #4a90e2;
            color: #ffffff;
        }
        .btn-standard {
            background-color: #ffffff;
            color: #4a90e2;
        }
        .btn-premium {
            background-color: #4a90e2;
            color: #ffffff;
        }
    </style>
</head>
<body>
<div class="pricing-table">
    <!-- Plan de recharge à 10€ -->
    <div class="card basic">
        <h3>RECHARGE 10€</h3>
        <div class="price">10€</div>
        <div class="features">
            <div>Montant crédité : 10€</div>
            <div>Frais de transaction : 1%</div>
        </div>
        <form action="{{ route('stripe.payment') }}" method="post">
            @csrf
            <input type="hidden" name="amount" value="10">
            <button type="submit" class="btn btn-custom btn-basic">CHARGER 10€</button>
        </form>
    </div>

    <!-- Plan de recharge à 50€ -->
    <div class="card standard">
        <h3>RECHARGE 50€</h3>
        <div class="price">50€</div>
        <div class="features">
            <div>Montant crédité : 50€</div>
            <div>Bonus : +5€ offert</div>
            <div>Frais de transaction : 0.8%</div>
        </div>
        <form action="{{ route('stripe.payment') }}" method="post">
            @csrf
            <input type="hidden" name="amount" value="50">
            <button type="submit" class="btn btn-custom btn-standard">CHARGER 50€</button>
        </form>
    </div>

    <!-- Plan de recharge à 100€ -->
    <div class="card premium">
        <h3>RECHARGE 100€</h3>
        <div class="price">100€</div>
        <div class="features">
            <div>Montant crédité : 100€</div>
            <div>Bonus : +15€ offert</div>
            <div>Frais de transaction : 0.5%</div>
        </div>
        <form action="{{ route ('stripe.payment') }}" method="post">
            @csrf
            <input type="hidden" name="amount" value="100">
            <button type="submit" class="btn btn-custom btn-premium">CHARGER 100€</button>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-q2aXJlv0e3KQQRvQoPpw3xRpLxiPZwkBtUyXoS9rywFotXHc/TL45hHNbocFQM" crossorigin="anonymous"></script>
</body>
</html>