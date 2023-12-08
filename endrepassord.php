<?php
// Inkluderer filen for databaseforbindelse
include 'db_connect.php';

// Starter en PHP-sesjon
session_start();

// Sjekker om skjemaet er sendt med POST-metoden
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Henter nåværende og nytt passord fra skjemaet
    $currentpassord = $_POST['currentpassord'];
    $newpassord = $_POST['newpassord'];
    
    // Henter brukerens ID fra sesjonen
    $id = $_SESSION['id'];

    // Lager en spørring for å hente nåværende passord fra databasen basert på brukerens id
    $sql = "SELECT passord FROM brukere WHERE id = $id";
    $result = $conn->query($sql);

    // Sjekker om det er nøyaktig én rad i resultatet
    if ($result->num_rows == 1) {
        // Henter nåværende passord fra resultatet
        $row = $result->fetch_assoc();
        $current_passord_db = $row['passord'];

        // Sammenligner nåværende passord fra skjemaet med det fra databasen
        if ($currentpassord === $current_passord_db) {
            // Lager en spørring for å oppdatere passordet i databasen med det nye passordet
            $update_sql = "UPDATE brukere SET passord = '$newpassord' WHERE id = $id";
            
            if ($conn->query($update_sql) === TRUE) {
                header("location: home.php");
            } else {
                echo "Error updating password: " . $conn->error;
            }
        } else {
            echo "Feil passord";
        }
    } else {
        echo "Bruker ikke funnet";
    }
}
?>

