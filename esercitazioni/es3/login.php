<?php
// Connessione al database
$connessione = mysqli_connect("localhost", "root", "", "scuola");

// Controllo se la connessione funziona
if (!$connessione) {
    die("Connessione fallita: " . mysqli_connect_error());
}

// Prendo i dati inviati dal form
$username = $_POST['username'];
$password = $_POST['password'];

// Controllo se l'utente esiste
$query = "SELECT * FROM utenti WHERE username = '$username' AND password = '$password'";
$risultato = mysqli_query($connessione, $query);

// Se l'utente esiste
if (mysqli_num_rows($risultato) > 0) {
    echo "Login riuscito! Benvenuto, " . $username;
} else {
    // L'utente non esiste, lo aggiungo
    $inserimento = "INSERT INTO utenti (username, password) VALUES ('$username', '$password')";
    
    if (mysqli_query($connessione, $inserimento)) {
        echo "Utente registrato. Accesso riuscito! Benvenuto, " . $username;
    } else {
        echo "Errore nella registrazione.";
    }
}

// Chiudo la connessione
mysqli_close($connessione);
?>
