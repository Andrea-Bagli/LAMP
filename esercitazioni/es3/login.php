<?php
// Credenziali valide
$username = "mario";
$password = "scuola123";

// Dati inviati dal form
$utente = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Verifica credenziali
if ($utente === $username && $password === $password) {
    echo "Login riuscito! Benvenuto.";
} else {
    echo "Username o password errati.";
}
?>