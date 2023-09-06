<?php
$a = "PHP5";
echo '<h2>Ejercicio 3</h2>';
echo  "<p>Contenido de la variable a es:  $a</p>";
$z[] = &$a;
echo  "<p>Contenido de la variable z es:  </p>",var_dump($z);
$b = "5a version de PHP";
echo  "<p>Contenido de la variable b es:  $b</p>";
@$c = $b*10;
echo'<h2>El valor de c no es posible de dar porque multiplica un string con un int por lo tanto la operacion es invalida</h2>';
//El tipo de operacion de c es incorrecto y lanza extraños resultados
echo  "<p>Contenido de la variable c es:  $c</p>";
$a .= $b;
echo  "<p>Contenido de la variable a renombrada es:  $a </p>";
$b *= $c;
echo  "<p>Contenido de la variable b renombrada es:  $b </p>";
$z[0] = "MySQL";
echo  "<p>Contenido de la variable z renombrada es:  </p>",var_dump($z);
?>