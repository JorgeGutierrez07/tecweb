<?php
use API\backend\Productos;

require_once __DIR__ ."/API/Productos.php";

$lista = new Productos();
$lista->list();
echo $lista->getResponse();
?>