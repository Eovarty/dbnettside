<?php
include 'db_connect.php';

session_start();

// Sjekker om skjemaet er sendt med POST-metoden, og henter nåværende brukernavn og det nye brukernavnet fra endrebrukernavnside.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $currentbrukernavn = $_POST['currentbrukernavn'];
    $newbrukernavn = $_POST['newbrukernavn'];
    
    $id = $_SESSION['id'];
 
    // spørring for å hente brukernavnet fra databasen basert på id
    $sql = "SELECT brukernavn FROM brukere WHERE id = $id";
    $result = $conn->query($sql);
 
    // Sjekker om det er nøyaktig én rad i resultatet
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $current_brukernavn_db = $row['brukernavn'];
 
        // Sjekker om det nåværende brukernavnet fra skjemaet er likt som det i databasen
        if ($currentbrukernavn === $current_brukernavn_db) {
            // spørring for å endre brukernavnet i databasen
            $update_sql = "UPDATE brukere SET brukernavn = '$newbrukernavn' WHERE id = $id";
            
            if ($conn->query($update_sql) === TRUE) {
                header("location: home.php");
            } else {
                echo "Error bruker: " . $conn->error;
            }
        } else {
            echo "Feil brukernavn";
        }
    } else {
        echo "Bruker ikke funnet";
    }
}
?>