<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande de retrait</title>
</head>
<body>
    <h1>Demande de retrait du coach</h1>
    <p>Le coach {{ $coach->name }} a effectué une demande de retrait.</p>
    <ul>
        <li><strong>Montant demandé :</strong> {{ $amount }} €</li>
        <li><strong>Numéro de compte bancaire :</strong> {{ $bank_account_number }}</li>
        <li><strong>Solde actuel du coach :</strong> {{ $coach->wallet->balance }} €</li>
        <li><strong>Date de la demande :</strong> {{ now()->format('d/m/Y H:i') }}</li>
    </ul>
    <p>Veuillez approuver ou refuser cette demande.</p>
</body>
</html>
