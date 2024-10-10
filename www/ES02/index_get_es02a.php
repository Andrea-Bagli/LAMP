<!DOCTYPE html>
<html>
<head>
    <title>Accesso a pagina riservata</title>
</head>
<body>
    <h1>Accesso a pagina riservata</h1>
    <p>Accesso consentito solo agli utenti registrati</p>

    <form action="es02a2.php" method="GET">

        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
        <br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <br>
        <input type="submit" value="Accedi">
        <input type="reset" value="Annulla">

    </form>
</body>
</html>