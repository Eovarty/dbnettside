<?php
session_start();

// Inkluderer filen som håndterer databaseforbindelsen
include "db_connect.php";

// Sjekker om brukernavn og passord er sendt via POST-metoden
if(isset($_POST['brukernavn']) && isset($_POST['passord'])) {
    
    // Valideringsfunksjon for å trimme, fjerne backslashes og konvertere spesialtegn (ikke brukt her)
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Henter og validerer brukernavn og passord fra POST-forespørselen
    $brukernavn = validate($_POST['brukernavn']);
    $passord = validate($_POST['passord']);

    // Sjekker om brukernavn er tomt, sender brukeren tilbake til index.php med feilmelding hvis det er tilfelle
    if(empty($brukernavn)) {
        header ("Location: index.php?error=Username is required!");
        exit();
    }
    // Sjekker om passord er tomt, sender brukeren tilbake til index.php med feilmelding hvis det er tilfelle
    else if(empty($passord)) {
        header ("Location: index.php?error=Password is required!");
        exit();
    }

    // Lager en spørring for å hente en rad fra databasen der både brukernavn og passord er lik som med input
    $sql = "SELECT * FROM brukere WHERE brukernavn='$brukernavn' AND passord='$passord'"; 

    // Utfører SQL-spørringen
    $result = mysqli_query($conn, $sql);

    // Sjekker antallet rader i resultatet og henter raden som er lik
    if(mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // Sjekker om brukernavn og passord er like
        if($row['brukernavn'] === $brukernavn && $row['passord'] === $passord) {
            echo "Innlogget";
            $_SESSION['brukernavn'] = $row['brukernavn'];
            $_SESSION['id'] = $row['id'];
            // sender deg videre til home.php
            header("Location: home.php");
            exit();
        }
        else{
            // feilmelding
            header("Location: index.php?error=Ugyldig brukernavn eller passord!");
            exit();
        }
    }
    else {
        // feilmelding
        header("Location: index.php?error=Ugyldig brukernavn eller passord!");
        exit();
    }
}
?>

