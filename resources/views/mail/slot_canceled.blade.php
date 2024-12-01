<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annulation de votre réservation</title>
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
        <h1>Votre réservation a été annulée</h1>
        <p>Le créneau suivant a été annulé :</p>
        <ul>
            <li><strong>Nom :</strong> {{ $slot['title'] }}</li>
            <li><strong>Date :</strong> {{ $slot['date'] }}</li>
            <li><strong>Heure :</strong> {{ $slot['start_time'] }} - {{ $slot['end_time'] }}</li>
        </ul>
        <p><strong>Raison :</strong> {{ $reason }}</p>
        <p>Nous nous excusons pour le désagrément.</p>
    </div>
</body>
</html>
