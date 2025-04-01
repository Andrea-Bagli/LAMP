<?php
require("function.php");
session_start();

if(!isset($_SESSION['userid'])){
    header('Location: ES_c.php');
    die();
}

$user = $_SESSION['username'];



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizi</title>
</head>
<body>
    <h1>PAGINA RISERVATA</h1>
    <h2>Benvenuto <?=$user?> nell'area riservata del sito</h2>

    <a href='logout.php'>logout</a>

    

</body>
</html>