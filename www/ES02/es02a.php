<?php


if ($_server['REQUEST_METHOD']== "POST"){
  $username = $_POST['username'];
  $passwd = $_POST['password'];
}

if ($_server['REQUEST_METHOD']== "GET"){
  $username = $_GET['username'];
  $passwd = $_GET['password'];
}

if($username=="Mario" && $passwd=="123") {
  $msg = "Benvenuto\a $username nella pagina riservata del mio sito!";
} else {
  $msg = "Credenziali sbagliate";
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Accesso a pagina riservata</title>
</head>
<body>
  <h3>Pagina di Accesso</h3>
  
  <?=$msg?>

</body>
</html>