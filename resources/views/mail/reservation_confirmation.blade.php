<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de réservation</title>
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
        <h1>Confirmation de réservation</h1>
        <p>Bonjour {{ $user->name }},</p>
        <p>Merci d'avoir réservé une place pour le slot suivant :</p>
        <div class="details">
            <p><strong>Titre :</strong> {{ $slot->title }}</p>
            <p><strong>Description :</strong> {{ $slot->description }}</p>
            <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($slot->date)->format('d/m/Y') }}</p>
            <p><strong>Heure de début :</strong> {{ \Carbon\Carbon::parse($slot->start_time)->format('H:i') }}</p>
            <p><strong>Heure de fin :</strong> {{ \Carbon\Carbon::parse($slot->end_time)->format('H:i') }}</p>
            <p><strong>Créé par :</strong> {{ $slot->coach->name }}</p>
            <p><strong>Prix :</strong> {{ number_format($slot->price, 2) }}€</p>
            <p><strong>Lieu :</strong> {{ $slot->location }}</p>
        </div>
        <p>Nous vous remercions de votre confiance.</p>
        <p>À bientôt sur <strong>SLOTEAM</strong> !</p>
    </div>
</body>
</html>
