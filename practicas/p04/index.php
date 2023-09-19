<!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.1//EN” “http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd”>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang=“es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> Practica 4 </title>
    <html lang="en">

    </head>

<body>
    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    <form action="http://localhost/tecweb/practicas/p04/index.php" method="get">
        <label for="num">Numero</label><br>
        <input type="number" name="numero">
        <input type="submit">
        <br>
    </form>
    <?php

    //Inclusion de funciones de soluciones de problemas
    include 'funciones.php';
    include 'Ejercicio5.php';

    if (isset($_GET['numero'])) {
        $num = $_GET['numero'];
        ejer1($num);
    }
    ?>
    <h2>Ejercicio 2</h2>
    <p>Crea un programa para la generación repetitiva de 3 números aleatorios hasta obtener una
        secuencia compuesta por:</p>
    <?php
    ejer2();
    ?>

    <h2>Ejercicio3</h2> 
    <form action="http://localhost/tecweb/practicas/p04/index.php" method="get">
        <label for="primo">Numero</label><br>
        <input type="number" name="primo">
        <input type="submit">
        <br>
    </form> 
    <?php
    $num_encontrado = false;
    if (isset($_GET['primo'])) {
        $primo = $_GET['primo'];
        ejer3($num_encontrado, $primo);
    }

    ?>
    <h2>Ejercicio3 variante do while</h2>
    <?php
    if (isset($_GET['primo'])) {
        $num_encontrado1 = false;
        $primo1 = $_GET['primo'];
        ejer3do($primo1, $num_encontrado1);
    }
    ?>
    <h2>Ejercicio 4</h2>
    <p>
        Crear un arreglo cuyos índices van de 97 a 122 y cuyos valores son las letras de la a
        a la z. Usa la función chr(n) que devuelve el caracter cuyo código ASCII es n para poner
        el valor en cada índice. Es decir:
    </p>
    <?php
    ejer4();
    ?>
    <h2>Ejercicio 5</h2>
    <p>
        Usar las variables $edad y $sexo en una instrucción if para identificar una persona de
        sexo “femenino”, cuya edad oscile entre los 18 y 35 años y mostrar un mensaje de
        bienvenida apropiado.
    </p>
    <form action="http://localhost/tecweb/practicas/p04/Ejercicio5.php" method="post">
        <label for="edad">Edad</label>
        <br>
        <input type="number" name="edad">
        <br>
        <input type="radio" name="genero" value="Femenino">Mujer
        <br>
        <input type="radio" name="genero" value="Masculino">Hombre
        <br>
        <input type="submit">
        </form>

        <h2>Ejercicio 6</h2>
        <p>
            Crea en código duro un arreglo asociativo que sirva para registrar el parque vehicular de
            una ciudad. Cada vehículo debe ser identificado por:
        </p>

 <form action="http://localhost/tecweb/practicas/p04/form6.php" method= "post">
        <label for="matricula">Ingresa la matricula a buscar</label>
        <input type="search" name="matricula">

        <input type="submit" value="Buscar">
        
        <input type="button" value="Muestra todos los datos" name= "todo">
    </form>

    <form action="http://localhost/tecweb/practicas/p04/form6pt2.php">
        <input type="submit" value="Muestra todos los datos" name= "todo">
        </form>
</body>

</html>