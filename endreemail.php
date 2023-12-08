<?php
include 'db_connect.php';

session_start();

// Sjekker om skjemaet er sendt med POST-metoden
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $currentemail = $_POST['currentemail'];
    $newemail = $_POST['newemail'];
    
    // Henter brukerens ID fra sesjonen
    $id = $_SESSION['id'];

    // Lager en spørring for å hente nåværende e-postadresse fra databasen basert på brukerens id
    $sql = "SELECT email FROM brukere WHERE id = $id";
    $result = $conn->query($sql);

    // Sjekker om det er nøyaktig en rad i resultatet og  henter nåværende e-postadresse fra resultatet
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $current_email_db = $row['email'];

        // Sammenligner nåværende e-postadresse fra skjemaet med den fra databasen
        if ($currentemail === $current_email_db) {
            // Lager en spørring for å oppdatere e-postadressen i databasen med den nye e-postadressen
            $update_sql = "UPDATE brukere SET email = '$newemail' WHERE id = $id";
            
            // Utfører oppdateringen, og omdirigerer til home.php hvis vellykket, ellers viser en feilmelding
            if ($conn->query($update_sql) === TRUE) {
                header("location: home.php");
            } else {
                echo "Error updating password: " . $conn->error;
            }
        } else {
            echo "Feil email";
        }
    } else {
        echo "Bruker ikke funnet";
    }
}
?>
