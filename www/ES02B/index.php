<!-- http://204.216.213.176/inf3php/ES02A/ -->
<?php
$username = $_POST['nomeutente'];
$passwd = $_POST['password'];


if($username=="Mario" && $passwd=="123") {
  $msg = "Attenzione credenziali non corrette";
} else {
  $msg = "Benvenuto $username nella pagina riservata del sito!";
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Accesso a pagina riservata</title>
</head>
<body>
  <h3>Pagina di login</h3>
  
  <?=$msg?>

</body>
</html>