<?php
namespace API\BaseDeDatos;

abstract class DataBase {
    protected $conexion;
    protected $response;

    public function __construct($database="marketzone") {
        $this->conexion = @mysqli_connect(
            'localhost',
            'root',
            '202039466',
            $database
        );
    }
    public function getResponse() {
        // SE HACE LA CONVERSIÓN DE ARRAY A JSON
        return json_encode($this->response, JSON_PRETTY_PRINT);
    }
}
?>