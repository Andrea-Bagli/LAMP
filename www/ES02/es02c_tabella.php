<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{

    if (isset($_POST['numero'])) 
    {
        $numero = $_POST['numero'];

      
        echo "<h2>Tabella dei Quadrati e dei Cubi</h2>";
        echo "<table border='1'>
                <tr>
                    <th>Numero</th>
                    <th>Quadrato</th>
                    <th>Cubo</th>
                </tr>";

        for ($i = 1; $i <= $numero; $i++) 
        {
            echo "<tr>
                    <td>$i</td>
                    <td>" . ($i * $i) . "</td>
                    <td>" . ($i * $i * $i) . "</td>
                  </tr>";
        }

        echo "</table>";
    }
} else {
   
    visualizzaForm();
}


function visualizzaForm() 
{
    echo '
    <h2>Tabella dei Quadrati e dei Cubi</h2>
    <form method="post" action="">
        <label for="numero">Seleziona un numero N (1 a 10):</label>
        <select id="numero" name="numero">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select><br><br>
        <input type="submit" value="tabella">
    </form>
    ';
}
?>