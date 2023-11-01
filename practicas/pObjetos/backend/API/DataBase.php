<?php
namespace API\backend;

abstract class DataBase {
    protected $conexion;

    public function __construct($database="marketzone") {
        $this->conexion = @mysqli_connect(
            'localhost',
            'root',
            '202039466',
            $database
        );
    }
}
?>