<!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.1//EN” “http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd”>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang=“es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> Practica 4 </title>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulinos 5 y 6</title>
    </head>
<body>
<?php
//Ejercicio 5
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