<?php

?>
<!-- -------->
<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>endre passord</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>
<body>
    <form action="endrepassord.php" method="post">
        <img class="logo" src="logo.png" alt="logo"/>
        <h2>Endre</h2>
        <label>Bruker: </label>
        <input type="password" name="currentpassord" placeholder="Nåværende passord"><br/>
        <label>Passord: </label>
        <input type="password" name="newpassord" placeholder="Nytt Passord"><br/>
        <button type="submit">Endre</button><br/>
    </form>
</body>
</html>

</html>
<!-- -------->
<?php

?>