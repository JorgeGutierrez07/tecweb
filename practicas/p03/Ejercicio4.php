<?php
    echo'<h2>Ejercicio 4</h2>';
    $a1 = "PHP5";
    $z1[] = &$a;
    $b1 = "5a version de PHP";
   // $c1 = $b1*10;
    $a1 .= $b1;
    //$b1 *= $c1;
    $z1[0] = "MySQL";
    function leer(){
        global $a1, $b1, $r, $z1;
        $r = $a1 . $b1 . var_dump($z1);
    };
    leer();
    echo"<p>Variable global:  $r</p>";
?>