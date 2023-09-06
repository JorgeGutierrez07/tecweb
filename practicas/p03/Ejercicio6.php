<?php
        echo'<h2>Ejercicio 6</h2>';
        $a4 = "0";
        $b4 = "true";
        $c4 = false;
        $d4 = ($a4 OR $b4);
        $e4 = ($a4 AND $c4);
        $f4 = ($a4 XOR $b4);
        echo '<p>$a4: </p>';
        var_dump($a4);
        echo '<p>$b4: </p>';
        var_dump($b4);
        echo '<p>$c4: </p>';
        var_dump($c4);
        echo '<p>$d4: </p>';
        var_dump($d4);
        echo '<p>$e4: </p>';
        var_dump($e4);
        echo '<p>$f4: </p>';
        var_dump($f4);
        
        echo'<p>Transformar el valor booleano de c y e </p>';
        echo "<p>El valor booleano de $c4 es: " . (boolval($c4) ? 'TRUE' : 'FALSE') . "</p>";
        echo "<p>El valor booleano de $e4 es: " . (boolval($e4) ? 'TRUE' : 'FALSE') . "</p>";
    ?>
