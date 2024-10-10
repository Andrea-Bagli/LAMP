<html>
<head>
<title>Esercizio A</title>
<body>
<h1>Tavola Pitagorica</h1>

<?php 
echo '<table border="1">'; 
for($i=0; $i<10; $i++) 
{
     echo"\n\t<tr>"; 
     
     for($j=0; $j<10; $j++) 
     {
          $c = $i * $j;  
          echo "<td>$c</td>";
     }
     
}
echo "</table>";
?>
</body>
</html>