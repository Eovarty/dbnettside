<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="registreringsstyle.css">
</head>
<body>
    <form action="registrering.php" method="post">
        <img class="logo" src="logo.png" alt="logo"/>
        <h1>Register</h1>
        <label for="brukernavn">Brukernavn:</label>
        <input type="text" id="brukernavn" name="brukernavn" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="passord">Passord:</label>
        <input type="password" id="passord" name="passord" required><br>
        <button type="submit">Register</button>
    </form>
</body>
