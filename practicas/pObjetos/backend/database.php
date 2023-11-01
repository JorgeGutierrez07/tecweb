<?php
    $conexion = @mysqli_connect(
        'localhost',
        'root',
        '202039466',
        'marketzone'
    );

    /**
     * NOTA: si la conexión falló $conexion contendrá false
     **/
    if(!$conexion) {
        die('¡Base de datos NO conextada!');
    }
?>