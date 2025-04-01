<?php

// Costanti per la connessione al database
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'ES05_user');
define('DB_PASSWORD', 'nuova_password');
define('DB_NAME', 'ES05');

function login($Username, $password) {
    if (!isset($Username, $password)) 
        return [false, "Inserire le credenziali."];
    
    $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if (!$db) 
        return [false, "Errore di connessione al database."];
    
    $sql = "SELECT userid, username, password FROM utente WHERE Username='" . $Username . "'";
    $result = mysqli_query($db, $sql);
    
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            
            if ($row['password'] == $password) { 
                $_SESSION['userid'] = $row['userid'];
                $_SESSION['username'] = $row['username'];
                mysqli_close($db);
                return [true, "Login riuscito."];
            } else {
                mysqli_close($db);
                return [false, "Password errata."];
            }
        } else {
            mysqli_close($db);
            return [false, "Utente non trovato."];
        }
    } else {
        mysqli_close($db);
        return [false, "Errore nella query."];
    }
}
?>