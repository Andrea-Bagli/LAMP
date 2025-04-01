<?php
require 'function.php';

session_start(); // Avvia la sessione php.

$email = (isset($_POST['email'])) ? $_POST['email'] : "";
$password = (isset($_POST['password'])) ? $_POST['password'] : "";
[$retval,$errmsg]=login($email, $password);
if($retval) {header("location: riservata.php"); die();} 
?>
 
<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
  <h3>Pagina di login</h3>
  <?=$errmsg?>
  <form action="ES_c.php" method="post">
    <label>Email <input type="text" name="email" /></label><br />
    <label>Password <input type="password" name="password"/></label><br />
    <input type="submit" value="Login" /><input type="reset" value="Cancel" />
  </form>       
</body>
</html>

