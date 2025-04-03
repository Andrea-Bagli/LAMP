<?php

require 'libreria.php';

session_start();

checkSession();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recupera i dati dal form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Controlla se il login è corretto
    if (login_check($username, $password)) {
        // Login riuscito: reindirizza all'area protetta
        header("Location: riservata.php");
        exit();
    } else {
        // Login fallito, visualizza errore
        header("Location: login1.php?error=Credenziali non valide.");
        exit();
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <br>
        <input type="submit" value="Login">

        <input type="hidden" name="from" value="<?php echo $_GET['from']; ?>" >
    </form>
</body>
</html>