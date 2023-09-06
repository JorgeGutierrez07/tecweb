<?php
$a1 = "PHP5";
echo '<h2>Ejercicio 3</h2>';
echo  "<p>Contenido de la variable a es:  $a1</p>";
$z1[] = &$a1;
echo  "<p>Contenido de la variable z es:  </p>",var_dump($z1);
$b1 = "5a version de PHP";
echo  "<p>Contenido de la variable b es:  $b1</p>";
@$c1 = $b1*10;
//echo'<h2>El valor de c no es posible de dar porque multiplica un string con un int por lo tanto la operacion es invalida</h2>';
//El tipo de operacion de c es incorrecto y lanza extraños resultados
echo  "<p>Contenido de la variable c es:  $c1</p>";
$a1 .= $b1;
echo  "<p>Contenido de la variable a renombrada es:  $a1 </p>";
@$b1 *= $c1;
echo  "<p>Contenido de la variable b renombrada es:  $b1 </p>";
$z1[0] = "MySQL";
echo  "<p>Contenido de la variable z renombrada es:  </p>",var_dump($z1);
?>