<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation d'inscription à la Newsletter</title>
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
        <h1>Confirmez votre inscription</h1>
        <p>Merci de vous être inscrit à notre newsletter !</p>
        <p>Pour finaliser votre inscription, veuillez cliquer sur le bouton ci-dessous :</p>
        <a href="{{ route('newsletter-verify', $subscriber->verified_token) }}" class="confirm-button">Confirmer mon inscription</a>
        <p>Si vous n'avez pas demandé cette inscription, vous pouvez ignorer cet email.</p>
    </div>
</body>
</html>