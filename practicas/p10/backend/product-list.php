<?php
use API\Leer\Leer;

require_once __DIR__ ."/API/start.php";

$lista = new $lista();
$lista->list();
echo $lista->getResponse();
?>