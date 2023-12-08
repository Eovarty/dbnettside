

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pop-up Menu</title>
    <style>
        
        h1 {
            color: #3498db;
        }

        .popup-menu {
            position: relative;
            display: inline-block;
        }

        .popup-content {
            display: none;
            position: absolute;
            background-color: #fff;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            z-index: 1;
        }

        .popup-content a {
            color: #333;
            text-decoration: none;
            display: block;
            padding: 10px;
        }

        .popup-content a:hover {
            background-color: #f2f2f2;
        }

        .popup-menu:hover .popup-content {
            display: block;
        }
    </style>
</head>
<body>
    <div class="popup-menu">
        <span>Endre data</span>
        <div class="popup-content">
            <a href="endrebrukernavnside.php">Brukernavn</a>
            <a href="endreemailside.php">Email</a>
            <a href="endrepassordside.php">Passord</a>
        </div>
    </div>
</body>
</html>
