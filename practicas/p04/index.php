<!DOCTYPE html>
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

</html>