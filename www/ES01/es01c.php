<!DOCTYPE html>
<html>
<head>
    <title>Esercizio C</title>
</head>
<body>

<?php

echo "(a)<br>";
for ($i = 1; $i <= 8; $i++) 
{
    for ($j = 1; $j <= $i; $j++) 
    {
        echo "*";
    }
    echo "<br>";
}


echo "<br>(b)<br>";
for ($i = 8; $i >= 1; $i--)
 {
    for ($j = 1; $j <= $i; $j++) 
    {
        echo "*";
    }
    echo "<br>";
}


echo "<br>(c)<br>";
for ($i = 8; $i >= 1; $i--) 
{
    
    for ($j = 1; $j <= 8 - $i; $j++) 
    {
        echo "&nbsp;&nbsp;";
    }
   
    for ($k = 1; $k <= $i; $k++) 
    {
        echo "*";
    }
    echo "<br>";
}


echo "<br>(d)<br>";
for ($i = 1; $i <= 8; $i++) 
{
    
    for ($j = 1; $j <= 8 - $i; $j++) 
    {
        echo "&nbsp;&nbsp;";
    }
    
    for ($k = 1; $k <= $i; $k++) 
    {
        echo "*";
    }
    echo "<br>";
}
?>

</body>
</html>