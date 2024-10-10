<!DOCTYPE html>
<html lang >
<head>
<title>Esercizio B</title>
</head>
<body>
    <?php
        $name = "Paolo";

       
        $today = new DateTime("now", new DateTimeZone('Europe/Rome'));
        $hour = $today->format('H');

       
        if ($hour >= 8 && $hour < 12) 
        {
            $greeting = "Buongiorno";
        } elseif ($hour >= 12 && $hour < 20)
        {
            $greeting = "Buonasera";
        } else {
            $greeting = "Buonanotte";
        }

        $browser = $_SERVER['HTTP_USER_AGENT'];

        
        echo "$greeting $name, benvenuta nella mia prima pagina PHP!<br>";
        echo "Stai usando il browser: $browser";
    ?>