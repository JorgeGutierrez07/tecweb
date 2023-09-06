<?php
$a = "PHP5";
echo '<p>Ejercicio 3</p>';
echo  "<p>Contenido de la variable a es:  $a</p>";
$z[] = &$a;
echo  "<p>Contenido de la variable z es:  </p>",var_dump($z);
$b = "5a version de PHP";
echo  "<p>Contenido de la variable b es:  $b</p>";
// $c = $b*10; invalido
$a .= $b;
echo  "<p>Contenido de la variable a renombrada es:  $a </p>";

// $b *= $c; invalido
$z[0] = "MySQL";
echo  "<p>Contenido de la variable z renombrada es:  </p>",var_dump($z);
?>