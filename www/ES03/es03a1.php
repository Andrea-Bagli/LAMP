<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Raccolta dati dal form
    $nome = $_POST['nome'];              
    $cognome = $_POST['cognome'];
    $data_nascita = $_POST['data_nascita'];
    $codice_fiscale =$_POST['codice_fiscale'];
    $email = $_POST['email'];
    $cellulare = $_POST['cellulare'];
    $via = $_POST['via'];
    $CAP = $_POST['CAP'];
    $comune = $_POST['comune'];
    $provincia = $_POST['provincia'];
    $nickname = $_POST['nickname'];
    $password = $_POST['password'];

    // Validazione aggiuntiva nickname
    if ($nickname === $nome || $nickname === $cognome) {
        echo "Il nickname non può essere uguale al nome o al cognome.";
        exit;
    }

    // Validazione password
    if (!preg_match("/(?=.*[A-Z])(?=.*\d)(?=.*\W).{8,}/", $password)) {
        echo "La password deve contenere almeno una maiuscola, un numero e un carattere speciale.";
        exit;
    }

}
?>


<!DOCTYPE html>
<html lang="it">
<head>
   
    <title>Visualizzazione Dati Utente</title>
</head>
<body>
    <h2>Dati inseriti nel form:</h2>

    <?php
    // Verifica se il form è stato inviato correttamente tramite POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recupera i dati inviati dal form senza sanitizzazione
        $nome = isset($_POST['nome']) ? $_POST['nome'] : 'Non fornito';

        $cognome = isset($_POST['cognome']) ? $_POST['cognome'] : 'Non fornito';

        $data_nascita = isset($_POST['data_nascita']) ? $_POST['data_nascita'] : 'Non fornito';

        $codice_fiscale = isset($_POST['codice_fiscale']) ? $_POST['codice_fiscale'] : 'Non fornito';

        $email = isset($_POST['email']) ? $_POST['email'] : 'Non fornita';

        $cellulare = isset($_POST['cellulare']) ? $_POST['cellulare'] : 'Non fornito';

        $via = isset($_POST['via']) ? $_POST['via'] : 'Non fornito';

        $CAP = isset($_POST['CAP']) ? $_POST['CAP'] : 'Non fornito';

        $comune = isset($_POST['comune']) ? $_POST['comune'] : 'Non fornito';

        $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : 'Non fornito';

        $nickname = isset($_POST['nickname']) ? $_POST['nickname'] : 'Non fornito';

        $password = isset($_POST['password']) ? $_POST['password'] : 'Non fornito';

        
        // Visualizzazione dei dati
        echo "<p><strong>Nome:</strong> $nome</p>";
        echo "<p><strong>Cognome:</strong> $cognome</p>";
        echo "<p><strong>Data di nascita:</strong> $data_nascita</p>";
        echo "<p><strong>Codice Fiscale:</strong> $codice_fiscale</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Cellulare:</strong> $cellulare</p>";
        echo "<p><strong>Via:</strong> $via</p>";
        echo "<p><strong>CAP:</strong> $CAP</p>";
        echo "<p><strong>Comune:</strong> $comune</p>";
        echo "<p><strong>Provincia:</strong> $provincia</p>";
        echo "<p><strong>Nickname:</strong> $nickname</p>";
        echo "<p><strong>Password:</strong> $password</p>";

    } else {
        echo "<p>Nessun dato è stato inviato.</p>";
    }
    ?>

</body>
</html>