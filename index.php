<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nettbutikk</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>
<body>
    <form action="login.php" method="post">
        <img class="logo" src="logo.png" alt="logo"/>
        <h2>Login</h2>
        <label>Bruker: </label>
        <input type="text" name="brukernavn" placeholder="Brukernavn"><br/>
        <label>Passord: </label>
        <input type="password" name="passord" placeholder="Passord"><br/>
        <button type="submit">Login</button><br/>
        <a href="registreringside.php">register ny bruker her</a>
    </form>
</body>
</html>

</html>
<!-- -------->
<?php

?>