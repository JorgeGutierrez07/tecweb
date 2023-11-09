<?php
use API\Actualizar\Actualizar;

require_once __DIR__ ."/API/start.php";

$actualiza = new Actualizar();
$jsonOBJ = json_decode(json_encode($_POST));
$actualiza->editar($jsonOBJ);
echo $actualiza->getResponse();
/*
$producto = file_get_contents('php://input');
$data = array(
    'status'  => 'error',
    'message' => 'Error al editar'
);
if (!empty($producto)) {
    // SE TRANSFORMA EL STRING DEL JASON A OBJETO
    $jsonOBJ = json_decode($producto);
    // SE ASUME QUE LOS DATOS YA FUERON VALIDADOS ANTES DE ENVIARSE
    $sql = "UPDATE productos SET nombre = '{$jsonOBJ->nombre}', marca = '{$jsonOBJ->marca}',
        modelo = '{$jsonOBJ->modelo}',
        precio = {$jsonOBJ->precio},
        detalles = '{$jsonOBJ->detalles}',
        unidades = {$jsonOBJ->unidades},
        imagen = '{$jsonOBJ->imagen}' 
         WHERE id = {$jsonOBJ->id}";
    $result = $conexion->query($sql);

    if ($result) {
        $data['status'] =  "success";
        $data['message'] =  "Producto editado";
    } else {
        $data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($conexion);
    }
    $conexion->close();
}

// SE HACE LA CONVERSIÓN DE ARRAY A JSON
echo json_encode($data, JSON_PRETTY_PRINT);
*/


?>