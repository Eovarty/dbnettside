
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
            <img class="logo" src="logo.png" alt="logo" width="6%"/>
            <a class="title">Velkommen</a>
    
            </nav>
            <nav>
                <ul class="nav_links">
                    <li><a href="index.php">Login</a></li>
                    <li><a href="registreringside.php">Register</a></li>
                    <li><a href="slettbrukerside.php">Slett Bruker</a></li>
                    <li><a>
                    <!-- inkluderer kode for en "dropdown-meny" -->
                    <?php
                    include 'endredata.php';
                    ?>
                    </a></li>
                </ul>
            </nav>
           
        </header>
</body>
</html>
