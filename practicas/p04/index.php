<!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.1//EN” “http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd”>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang=“es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> Practica 4 </title>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Práctica 4</title>
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
    if (isset($_GET['numero'])) {
        $num = $_GET['numero'];
        if ($num % 5 == 0 && $num % 7 == 0) {
            echo '<h3>R= El número ' . $num . ' SÍ es múltiplo de 5 y 7.</h3>';
        } else {
            echo '<h3>R= El número ' . $num . ' NO es múltiplo de 5 y 7.</h3>';
        }
    }
    ?>
    <h2>Ejercicio 2</h2>
    <p>Crea un programa para la generación repetitiva de 3 números aleatorios hasta obtener una
        secuencia compuesta por:</p>
    <?php
    $aleatorio = array();
    $banderitas = true;
    $total = 0;
    $iteraciones = 0;

    while ($banderitas) {
        $numero1 = rand(1, 30);
        $numero2 = rand(1, 30);
        $numero3 = rand(1, 30);
        $iteraciones++;
        $total += 3;

        $aleatorio[] = [$numero1, $numero2, $numero3];

        if ($numero1 % 2 != 0 && $numero2 % 2 == 0 && $numero3 % 2 != 0) {
            $banderitas = false;
        }
    }
    foreach ($aleatorio as $fila) {
        echo implode("  ", $fila) . "<br>";
    }
    echo "Número de iteraciones: $iteraciones<br>";
    echo "Total de números generados: $total<br>"
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
        while (!$num_encontrado) {
            $alet = rand(1, 999);
            $num_generados[] = $alet;
            if ($alet % $primo == 0) {
                $num_encontrado = true;
                echo "Primer numero multiplo aleatorio encontrado de $primo es $alet<br>";
            }
        }
        echo implode(", ", $num_generados);
    }

    ?>
    <h2>Ejercicio3 variante do while</h2>
    <?php
    if (isset($_GET['primo'])) {
        $num_encontrado1 = false;
        $primo1 = $_GET['primo'];
        do {
            $alet1 = rand(1, 999);
            $num_generados1[] = $alet1;
            if ($alet1 % $primo1 == 0) {
                $num_encontrado1 = true;
            }
        } while (!$num_encontrado1);
        echo "Primer numero multiplo aleatorio encontrado de $primo1 es $alet1<br>";
        echo implode(", ", $num_generados1);
    }
    ?>
    <h2>Ejercicio 4</h2>
    <p>
        Crear un arreglo cuyos índices van de 97 a 122 y cuyos valores son las letras de la a
        a la z. Usa la función chr(n) que devuelve el caracter cuyo código ASCII es n para poner
        el valor en cada índice. Es decir:
    </p>
    <?php
    for ($i = 97; $i <= 122; $i++) {
        $conversor = chr($i);
        $abc[$i] = $conversor;
    }
    echo '<table style="border-collapse :collapse;">';
    echo '<tr>';
    foreach ($abc as $key => $value) {
        echo '<th style = "border: 1px solid;">' . $key;
    }
    echo '</tr>';
    echo '<tr>';
    foreach ($abc as $key => $value) {
        echo '<th style = "border: 1px solid;">' . $value;
    }
    echo '</tr>';
    echo '</table>';
    ?>
    <h2>Ejercicio 5</h2>
    <p>
        Usar las variables $edad y $sexo en una instrucción if para identificar una persona de
        sexo “femenino”, cuya edad oscile entre los 18 y 35 años y mostrar un mensaje de
        bienvenida apropiado.
    </p>
    <form action="http://localhost/tecweb/practicas/p04/index.php" method="post">
        <label for="edad">Edad</label>
        <br>
        <input type="number" name="edad">
        <br>
        <input type="radio" name="genero" value="Femenino">Mujer
        <br>
        <input type="radio" name="genero" value="Masculino">Hombre
        <br>
        <input type="submit">

        <?php
        if (isset($_POST['edad'], $_POST['genero'])) {
            $edad = $_POST['edad'];
            $genero = $_POST['genero'];
            if ($edad >= 18 && $edad <= 35 && $genero == 'Femenino') {
                echo 'Bienvenida usted esta entre el rango de edad permitido';
            } else {
                echo 'No esta permitida debido al rango de edad';
            }
        }
        ?>
</body>

</html>