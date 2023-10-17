<?php
include_once __DIR__ . '/database.php';

// SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
$producto = file_get_contents('php://input');
if (!empty($producto)) {
    // SE TRANSFORMA EL STRING DEL JASON A OBJETO
    $jsonOBJ = json_decode($producto);
    /**
     * SUSTITUYE LA SIGUIENTE LÍNEA POR EL CÓDIGO QUE REALICE
     * LA INSERCIÓN A LA BASE DE DATOS. COMO RESPUESTA REGRESA
     * UN MENSAJE DE ÉXITO O DE ERROR, SEGÚN SEA EL CASO.
     */
    $ver = ["mensaje" => ""];
    $checaObjeto = $conexion->query("SELECT COUNT(*) FROM productos WHERE nombre='{$jsonOBJ->nombre}' AND eliminado=0");
    $checaObjeto1 = $conexion->query("SELECT COUNT(*) FROM productos WHERE nombre='{$jsonOBJ->nombre}' AND eliminado=1");
    if ($checaObjeto->num_rows == 0) {
        $sql = "INSERT INTO productos VALUES (null, '{$jsonOBJ->nombre}', '{$jsonOBJ->marca}', '{$jsonOBJ->modelo}', {$jsonOBJ->precio}, '{$jsonOBJ->detalles}', {$jsonOBJ->unidades}, '{$jsonOBJ->imagen}', 0)";
        if ($conexion->query($sql)) {
            $ver["mensaje"] = "Producto agregado con exito con ID: " . $conexion->insert_id;
        } else {
            $ver["mensaje"] = "Producto no agregado";
        }
    } elseif ($checaObjeto1->num_rows == 1) {
        $sql = "INSERT INTO productos VALUES (null, '{$jsonOBJ->nombre}', '{$jsonOBJ->marca}', '{$jsonOBJ->modelo}', {$jsonOBJ->precio}, '{$jsonOBJ->detalles}', {$jsonOBJ->unidades}, '{$jsonOBJ->imagen}', 0)";
        if ($conexion->query($sql)) {
            $ver["mensaje"] = "Producto existente pero vigente agregado con exito  : " . $conexion->insert_id;
        } else {
            $ver["mensaje"] = "Producto no agregado";
        }
    } else {
        echo 'no agregado';
    }
    $conexion->close();
}
echo json_encode($ver, JSON_PRETTY_PRINT);
