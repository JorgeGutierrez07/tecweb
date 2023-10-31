<?php

namespace API\backend;

abstract class DataBase
{
    protected $conexion;
    protected $response;

    public function __construct($database = "marketzone")
    {
        $this->conexion = @mysqli_connect(
            'localhost',
            'root',
            '202039466',
            $database
        );

        if ($this->conexion) {
            die('Base de datos no conectada');
        }

        $this->response =  array();
    }
public function getResponse(){
    return json_encode($this->response, JSON_PRETTY_PRINT);
}
}

