<?php
echo'<h2>Ejercicio2</h2>';
    $a = "ManejadorSQL";
    $b = 'MySQL';
    $c = &$a; 
    echo '<p>Variables del Ejercicio 2';
    echo '<p>Iniciso d) </p>';
    echo '<p>Se nombraron variables dentro de la pagina y la variable de $a cambia a los </p>';
    echo '<p>y $b hace referencia al valor de $a</p>';
    echo '<br>';
    echo '<p>Contenido de variable de $a:  </p>',$a;
    echo '<p>Contenido de variable de $b:  </p>',$b;
    echo '<p>Contenido de variable de $c:  </p>',$c;

    $a = "PHP server";
    $b = &$a;
    echo '<p>Variable $b y $a modificada:  </p>',$b;
?>