<!DOCTYPE html>
<html lang="it">
<head>
  
    <title>Form validazione</title>
</head>
<body>
    <h2>Form di Registrazione Utente</h2>
    <form action="es03a1.php" method="POST">
        <!-- Nome -->
        <label for="nome">Nome*:</label>
        <input type="text" id="nome" name="nome" pattern="[A-Za-zÀ-ÿ\s]+" required>
        <br><br>

        <!-- Cognome -->
        <label for="cognome">Cognome*:</label>
        <input type="text" id="cognome" name="cognome" pattern="[A-Za-zÀ-ÿ\s']+" required>
        <br><br>

        <!-- Data di nascita -->
        <label for="data_nascita">Data di Nascita*:</label>
        <input type="date" id="data_nascita" name="data_nascita" required>
        <br><br>

        <!-- Codice Fiscale -->
        <label for="codice_fiscale">Codice Fiscale:</label>
        <input type="text" id="codice_fiscale" name="codice_fiscale">
        <br><br>

        <!-- Email -->
        <label for="email">Email*:</label>
        <input type="email" id="email" name="email" required>
        <br><br>

        <!-- Cellulare -->
        <label for="cellulare">Cellulare (12 cifre):</label>
        <input type="tel" id="cellulare" name="cellulare" pattern="[0-9]{12}">
        <br><br>

        <!-- Via -->
        <label for="via">Via*:</label>
        <input type="text" id="via" name="via" placeholder="via/piazza" required>
        <br><br>

         <!-- CAP -->
         <label for="CAP">CAP*:</label>
        <input type="text" id="CAP" name="CAP" pattern="^\d{5}$" required>
        <br><br>

         <!-- Comune -->
         <label for="Comune">Comune*:</label>
        <input type="text" id="comune" name="comune" required>
        <br><br>

         <!-- Provincia -->
         <label for="provincia">Provincia*:</label>
        <input type="text" id="provincia" name="provincia" required>
        <br><br>

        <!-- Nickname -->
        <label for="nickname">Nickname*:</label>
        <input type="text" id="nickname" name="nickname" required>
        <br><br>

        <!-- Password -->
        <label for="password">Password* :</label>
        <input type="password" id="password" name="password" pattern="(?=.*[A-Z])(?=.*\d)(?=.*\W).{8,}" required>
        <br><br>

        <input type="submit" value="Invia">
    </form>
</body>
</html>