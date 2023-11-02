<?php
use API\backend\Productos;

require_once __DIR__ ."/API/Productos.php";

$single = new Productos();
$single->single($_GET['id']);
echo $single->getResponse();

/*include("database.php");

$id = $_POST["id"];
$query = "SELECT * FROM productos WHERE id =$id";
$result = mysqli_query($conexion, $query);
if (!$result) {
    die('Query fallo');
}
$json = array();
while ($row = mysqli_fetch_array($result)) {
    $json[] =array(
    'nombre' => $row['nombre'],
    'marca' => $row['marca'],
    'modelo' => $row['modelo'],
    'precio' => $row['precio'],
    'detalles' => $row['detalles'],
    'unidades' => $row['unidades'],
    'imagen' => $row['imagen'],
    'id'=> $row['id'],
    );
}
$jsonstring = json_encode($json[0]);
echo $jsonstring;*/
?>