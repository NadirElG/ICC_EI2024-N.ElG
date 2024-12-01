<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de remboursement</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #4CAF50;
        }

        p {
            line-height: 1.6;
        }

        .details {
            margin: 20px 0;
            text-align: left;
        }

        .details p {
            margin: 5px 0;
        }

        .confirm-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .confirm-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Confirmation de remboursement</h1>
        <p>Vous avez été remboursé pour le créneau suivant :</p>
        <ul>
            <li><strong>Nom :</strong> {{ $slot->title }}</li>
            <li><strong>Date :</strong> {{ \Carbon\Carbon::parse($slot->date)->format('d/m/Y') }}</li>
            <li><strong>Montant remboursé :</strong> {{ $slot->price }} €</li>
        </ul>
        <p>Le montant a été ajouté à votre portefeuille.</p>
    </div>
</body>
</html>
