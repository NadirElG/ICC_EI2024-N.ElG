<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            grid-template-rows: repeat(6, 1fr);
            gap: 10px;
            padding: 20px;
        }

        .panel {
            background-color: white;
            border: 2px solid #333;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            color: #333;
        }

        /* Defining grid areas based on the image */
        .panel-1 { grid-column: 1 / 3; grid-row: 1 / 2; }
        .panel-2 { grid-column: 3 / 7; grid-row: 1 / 2; }
        .panel-3 { grid-column: 1 / 3; grid-row: 2 / 4; }
        .panel-4 { grid-column: 3 / 7; grid-row: 2 / 4; }
        .panel-5 { grid-column: 1 / 7; grid-row: 4 / 5; }
        .panel-6 { grid-column: 1 / 3; grid-row: 5 / 6; }
        .panel-7 { grid-column: 3 / 7; grid-row: 5 / 6; }
        .panel-8 { grid-column: 1 / 7; grid-row: 6 / 7; }

        /* Responsive styling */
        @media (max-width: 768px) {
            .container {
                grid-template-columns: repeat(2, 1fr);
                grid-template-rows: auto;
            }
            .panel {
                font-size: 12px;
                padding: 10px;
            }

            /* Adjusting grid layout for mobile */
            .panel-1, .panel-3, .panel-6 {
                grid-column: 1 / 3;
            }

            .panel-2, .panel-4, .panel-7 {
                grid-column: 1 / 3;
            }

            .panel-5, .panel-8 {
                grid-column: 1 / 3;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="panel panel-1">Clickable Area 1</div>
        <div class="panel panel-2">Clickable Area 2</div>
        <div class="panel panel-3">Clickable Area 3</div>
        <div class="panel panel-4">Clickable Area 4</div>
        <div class="panel panel-5">Main Content Area</div>
        <div class="panel panel-6">Clickable Area 6</div>
        <div class="panel panel-7">Clickable Area 7</div>
        <div class="panel panel-8">Footer / Extra Area</div>
    </div>

</body>
</html>
