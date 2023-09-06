<?php
    echo'<h2>Ejercicio 4</h2>';
    $a2 = "PHP5";
    $z2[] = &$a2;
    $b2 = "5a version de PHP";
    @$c2 = $b2*10; 
    $a2 .= $b2;
    @$b2 *= $c2;
    $z2[0] = "MySQL";
    function leer(){
        global $a2, $b2, $c2, $r, $z2;
        $r = $a2 . $b2 .$c2 . var_dump($z2);
    };
    leer();
    echo"<p>Variable global:  $r</p>";
?>