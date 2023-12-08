<?php
// Inkluderer filen for å koble til database
include 'db_connect.php';

$brukernavn = $email = $passord = "";

// Sjekker om skjemaet er sendt med POST-metoden
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Henter brukernavn, e-post og passord fra skjemaet
    $brukernavn = $_POST['brukernavn'];
    $email = $_POST['email'];
    $passord = $_POST['passord'];

    // Setter brukerinformasjonen inn i databasen
    $sql = "INSERT INTO brukere (brukernavn, email, passord) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Binder verdiene sammen for 
    $stmt->bind_param("sss", $brukernavn, $email, $passord);

    // Utfører forberedt Kommando
    if ($stmt->execute()) {
        echo "Registration successful!";
        // Sender bruker videre til home.php
        header("Location: home.php");
        exit();
    } else {
        // feilmelding
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Sjekker om brukernavn og passord er tomme og viser feilmeilding om de er
if (empty($brukernavn)) {
    header("Location: index.php?error=Username is required!");
    exit();
} else if (empty($passord)) {
    header("Location: index.php?error=Password is required!");
    exit();
}

// Lukker databaseforbindelsen
$conn->close();
?>

