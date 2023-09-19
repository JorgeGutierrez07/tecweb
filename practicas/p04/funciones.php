<?php
function ejer1($num)
{
    //Ejercicio 1
    if ($num % 5 == 0 && $num % 7 == 0) {
        echo '<h3>R= El número ' . $num . ' SÍ es múltiplo de 5 y 7.</h3>';
    } else {
        echo '<h3>R= El número ' . $num . ' NO es múltiplo de 5 y 7.</h3>';
    }
}
?>
<?php
//Ejercicio 2
function ejer2()
{
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
    echo "Total de números generados: $total<br>";
}
function ejer3($num_encontrado, $primo)
{
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
function ejer3do($primo1, $num_encontrado1)
{
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
//Ejercicio 4
function ejer4()
{
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
}
?>