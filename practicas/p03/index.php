<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> Titulo de la página </title>
</head>

<body>
    <h2>Ejercicio 1</h2>
    <p> Determina cual de las siguientes variables son validas y explica por que:</p>
    <p>$_myvar, $_7var, myvar, $myvar, $var7, $_element1, $house*5</p>
    <?php
    //Aqui va mi codigo php
    $_myvar;
    $_7var;
    //myvar;
    $myvar;
    $var7;
    $_element1;

    // $house*5;  invalida
    echo '<ul>';
    echo '<li>$_myvar es valida porque inicia con guion bajo.</li>';
    echo '<li>$_7var; es valida porque inicia con guion bajo.</li>';
    echo '<li>$myvar; es valida porque inicia con una letra.</li>';
    echo '<li>$var7; es valida porque inicia con una letra.</li>';
    echo '<li>$_element1; es valida porque inicia con guion bajo.</li>';
    echo '</ul>';
    ?>

    <?php
    include 'Ejercicio2.php';

    ?>

    <h2>Ejercicio 3</h2>
    <?php
    include 'Ejercicio3.php';
    ?>

    <h2>Ejercicio 4</h2>
    <?php
    include'Ejercicio4.php';
    ?>
    <h2>Ejercicio 5</h2>
    <?php
    include'Ejercicio5.php';
    ?>
    
    <h2>Ejercicio 6</h2>
    <?php
    include 'Ejercicio6.php';
    ?>
    <h2>Ejercicio 7</h2>
    <?php
    include'Ejercicio7.php';
    ?>
</body>

</html>