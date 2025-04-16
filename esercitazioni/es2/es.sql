<?php
// Connessione al database
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'ES05_user');
define('DB_PASSWORD', 'mia_password');
define('DB_NAME', 'ES05');

$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);


if (!$conn) {
    die("Connessione fallita: " . mysqli_connect_error());
}


$query = "SHOW TABLES FROM $database";
$result = mysqli_query($conn, $query);


if ($result) {
    echo "<h3>Tabelle presenti nel database <em>$database</em>:</h3>";
    echo "<ul>";
    while ($row = mysqli_fetch_row($result)) {
        echo "<li>" . $row[0] . "</li>";
    }
    echo "</ul>";
} else {
    echo "Errore nella query: " . mysqli_error($conn);
}


mysqli_close($conn);
?>