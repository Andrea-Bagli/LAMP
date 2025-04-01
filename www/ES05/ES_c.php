<?php
require 'function.php';

session_start(); // Avvia la sessione php.

if (isset($_SESSION['userid'])) {
  header('Location: riservata.php');
  die();
}

$Username = (isset($_POST['Username'])) ? $_POST['Username'] : NULL;
$password = (isset($_POST['password'])) ? $_POST['password'] : NULL;
[$retval,$errmsg]=login($Username, $password);
if($retval) {header("location: riservata.php"); die();} 
?>
 
<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
  <h3>Pagina di login</h3>
  <?=$errmsg?>
  <form action="ES_c.php" method="post">
    <label>Username <input type="text" name="Username" /></label><br />
    <label>Password <input type="password" name="password"/></label><br />
    <input type="submit" value="Login" /><input type="reset" value="Cancel" />
  </form>       
</body>
</html>

