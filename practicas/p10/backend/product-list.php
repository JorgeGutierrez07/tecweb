<?php
use API\Leer\Leer;

require_once __DIR__ ."/API/start.php";

$lista = new Leer();
$lista->list();
echo $lista->getResponse();
?>