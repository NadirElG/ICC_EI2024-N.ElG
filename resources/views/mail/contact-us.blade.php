<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; /* Bleu clair */
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
            color: #1e90ff; /* Bleu vif */
            font-size: 24px;
        }

        p {
            line-height: 1.6;
            color: #333;
        }

        .message-content {
            font-size: 18px;
            color: #1e90ff;
            padding: 20px;
            border: 1px solid #1e90ff;
            border-radius: 5px;
            background-color: #f0f8ff;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <p>Formulaire ContactUs envoyé par:</p>
        <h3>{{ $email }}</h3>

        <h1>{{ $subject }}</h1>
        <div class="message-content">
            {{ $messageContent }}
        </div>
    </div>
</body>
</html>
