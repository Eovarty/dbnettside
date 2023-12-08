<?php
 
include 'hjem.php';

require_once('db_connect.php');
$query = "select * from brukere";
$result = mysqli_query($conn,$query);
session_start();

if(isset($_SESSION['id'])) {
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="homestyle.css">
</head>
<body class="bg-dark">
    <div class ="beholder">
        <div class ="row">
            <div class ="col">
                <div class ="card">
                    <div class ="card-header">
                        <h2 class ="display-6 text center">Bruker data</h2>
                    </div>
                    <div class ="card-body">
                        <table>
                            <tr class= "bg-dark text-white">
                                <td>Brukernavn</td>
                                <td>Email</td>
                                <td>Registreringsdato</td>
                            </tr>
                            <tr>
                            <?php
                            //Viser valgte rader med data i en tabell
                            while ($row = mysqli_fetch_assoc($result))
                            {
                            ?>
                            <td><?php echo $row['brukernavn']?></td>
                            <td><?php echo $row['email']?></td>
                            <td><?php echo $row['dato']?></td>
                            </tr>
                            <?php
                            }
                            ?>
</body>
</html>

<?php
}
else {
    header("Location: index.php");
    exit();
}

?>