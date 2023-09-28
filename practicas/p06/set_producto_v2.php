<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="es">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <table class="table">
        <thead class="thead-dark">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nombre = $_POST['nombre'];
                $marca = $_POST['marca'];
                $modelo = $_POST['modelo'];
                $precio = $_POST['precio'];
                $detalles = $_POST['detalles'];
                $unidades = $_POST['unidades'];
                $imagen = $_POST['imagen'];

                $validador = false;

                if (!empty($nombre) && !empty($marca) && !empty($modelo) && !empty($precio) && !empty($detalles) && !empty($unidades) && !empty($imagen)) {
                    if (!preg_match("/^[a-zA-Z ]+$/", $nombre)) {
                        echo "<p>Por favor ingresa un nombre valido</p>";
                    } elseif (!preg_match("/^[-a-zA-Z0-9 ]+$/", $marca)) {
                        echo "<p>Por favor ingresa una marca valido</p>";
                    } elseif (!preg_match("/^[0-9.,]+$/", $precio)) {
                        echo "<p>Por favor ingresa precios validos</p>";
                    } elseif (!preg_match("/^[a-zA-Z0-9.%:, ]+$/", $detalles)) {
                        echo "<p>Por favor ingresa un campo de detalles valido</p>";
                    } elseif (!preg_match("/^[0-9]+$/", $unidades)) {
                        echo "<p>Por favor ingresa unidades validas</p>";
                    } elseif (!preg_match("/^[-a-zA-Z0-9 ]+$/", $modelo)) {
                        echo "<p>Por favor ingresa modelos validos</p>";
                    } elseif (!preg_match("/^[-a-zA-Z0-9_.\/]+$/", $imagen)) {
                        echo "<p>Por favor ingresa una imagen valida</p>";
                    } else {
                        $validador = true;
                    }
                } else {
                    echo 'Por favor completa los campos';
                }
                if ($validador) {
                    /** SE CREA EL OBJETO DE CONEXION */
                    @$link = new mysqli('localhost', 'root', '202039466', 'marketzone');

                    /** comprobar la conexión */
                    if ($link->connect_errno) {
                        die('Falló la conexión: ' . $link->connect_error . '<br/>');
                        /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
                    }
                    /** Crear una tabla que no devuelve un conjunto de resultados */
                    $sql = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}')";
                    if ($link->query($sql)) {

                        echo '<p>Producto insertado: ' . $link->insert_id . '</p>';
                        echo '<tr>';
                        echo '<td>' . "Nombre" ."<br>". $nombre . ' </td>';
                        echo '<td>' . "Marca" ."<br>". $marca . ' </td>';
                        echo '<td>' . "Modelo" ."<br>". $modelo . ' </td>';
                        echo '<td>' . "Precio" ."<br>". $precio . ' </td>';
                        echo '<td>' . "Unidades" ."<br>". $unidades . ' </td>';
                        echo '<td>' . "Detalles" ."<br>". $detalles . ' </td>';
                        echo '<td>' . "<img width= 100 height= 126 src= imagen >" ."<br>". $imagen . '</td>';
                        echo "</tr>";
                    } else {
                        echo 'El Producto no pudo ser insertado =(';
                    }
                    $link->close();
                }
            }

            ?>
</body>