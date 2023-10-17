<?php
include_once __DIR__ . '/database.php';
$ver = ["mensaje" => ""];
// SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
$producto = file_get_contents('php://input');
if (!empty($producto)) {
    // SE TRANSFORMA EL STRING DEL JASON A OBJETO
    $jsonOBJ = json_decode($producto);
    //SE EVALUA SI EL PRODUCTO YA EXISTE EN LA BASE DE DATOS
    $checaobjeto = $conexion->query("SELECT * FROM productos WHERE nombre = '{$jsonOBJ->nombre}' AND eliminado = 0 ");
    $checaobjeto1 = $conexion->query("SELECT * FROM productos WHERE nombre = '{$jsonOBJ->nombre}' AND eliminado = 1");

    if ($checaobjeto->num_rows == 0) {
        $sql = "INSERT INTO productos VALUES (null, '{$jsonOBJ->nombre}', '{$jsonOBJ->marca}', '{$jsonOBJ->modelo}', {$jsonOBJ->precio}, '{$jsonOBJ->detalles}', {$jsonOBJ->unidades}, '{$jsonOBJ->imagen}',0)";
        if ($conexion->query($sql)) {
            $ver["mensaje"] = "Producto registrado con ID: ".$conexion->insert_id;
        } else {
            $ver["mensaje"] = "Producto no registrado";
        }
    } elseif ($checaobjeto1->num_rows == 1) {
        $sql = "INSERT INTO productos VALUES (null, '{$jsonOBJ->nombre}', '{$jsonOBJ->marca}', '{$jsonOBJ->modelo}', {$jsonOBJ->precio}, '{$jsonOBJ->detalles}', {$jsonOBJ->unidades}, '{$jsonOBJ->imagen}',0)";
        if ($conexion->query($sql)) {
            $ver["mensaje"] = "El producto existente en la base de datos y vigente".$conexion->insert_id;
        } else {
            $ver["mensaje"] = "Producto no registrado ";
        }
    } else {
        $ver["mensaje"] = "Producto disponible y vigiente por lo tanto no puede ser agregado";
    }
}
    $conexion->close();

echo json_encode($ver, JSON_PRETTY_PRINT);
