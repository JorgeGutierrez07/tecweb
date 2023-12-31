<?php

namespace API\backend;

use \API\backend\DataBase;

include_once __DIR__ . "/DataBase.php";

class Productos extends DataBase
{
    private $response;

    public function __construct($database = 'marketzone')
    {
        parent::__construct($database);
        $this->response = array();
    }
    public function agregar($jsonOBJ)
    {
        $producto = file_get_contents('php://input');
        $this->response = array(
            'status'  => 'Error',
            'message' => 'Ya existe un producto con ese nombre'
        );
        if (!empty($producto)) {
            $jsonOBJ = json_decode($producto);
            $sql = "SELECT * FROM productos WHERE nombre = '{$jsonOBJ->nombre}' AND eliminado = 0";
            $result = $this->conexion->query($sql);

            if ($result->num_rows == 0) {
                $this->conexion->set_charset("utf8");
                $sql = "INSERT INTO productos VALUES (null, '{$jsonOBJ->nombre}', '{$jsonOBJ->marca}', '{$jsonOBJ->modelo}', {$jsonOBJ->precio}, '{$jsonOBJ->detalles}', {$jsonOBJ->unidades}, '{$jsonOBJ->imagen}', 0)";
                if ($this->conexion->query($sql)) {
                    $this->response['status'] =  "success";
                    $this->response['message'] =  "Producto agregado";
                } else {
                    $this->response['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
                }
            }
            $result->free();
            // Cierra la conexion
            $this->conexion->close();
        }
    }

    public function eliminar($id){
        $this->response = array(
            'status'  => 'error',
            'message' => 'La consulta falló'
        );
        if (!empty($id)) {
            // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
            $sql = "UPDATE productos SET eliminado=1 WHERE id = {$id}";
            if ($this->conexion->query($sql)) {
                $this->response['status'] =  "success";
                $this->response['message'] =  "Producto eliminado";
            } else {
                $this->response['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
            }
            $this->conexion->close();
        }
    }

    public function editar($jsonOBJ){
        $producto = file_get_contents('php://input');
        $this->response = array(
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
            $result = $this->conexion->query($sql);
        
            if ($result) {
                $this->response['status'] =  "success";
                $this->response['message'] =  "Producto editado";
            } else {
                $this->response['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
            }
            $this->conexion->close();
    }
}
public function search($search){
    if(!empty($search)){
         // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
         $sql = "SELECT * FROM productos WHERE (id = '{$search}' OR nombre LIKE '%{$search}%' OR marca LIKE '%{$search}%' OR detalles LIKE '%{$search}%') AND eliminado = 0";
         if ( $result = $this->conexion->query($sql) ) {
             // SE OBTIENEN LOS RESULTADOS
             $rows = $result->fetch_all(MYSQLI_ASSOC);
 
             if(!is_null($rows)) {
                 // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
                 foreach($rows as $num => $row) {
                     foreach($row as $key => $value) {
                         $this->response[$num][$key] = utf8_encode($value);
                     }
                 }
             }
             $result->free();
         } else {
             die('Query Error: '.mysqli_error($this->conexion));
         }
         $this->conexion->close();
    }
}
public function list(){
    if ( $result = $this->conexion->query("SELECT * FROM productos WHERE eliminado = 0") ) {
        // SE OBTIENEN LOS RESULTADOS
        $rows = $result->fetch_all(MYSQLI_ASSOC);

        if(!is_null($rows)) {
            // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
            foreach($rows as $num => $row) {
                foreach($row as $key => $value) {
                    $this->response[$num][$key] = utf8_encode($value);
                }
            }
        }
        $result->free();
    } else {
        die('Query Error: '.mysqli_error($this->conexion));
    }
    $this->conexion->close();

}
public function singleByName($name){
    if(!empty($name)){
        $sql = "SELECT * FROM productos WHERE  nombre LIKE '%{$name}%'  AND eliminado = 0";
        if ( $result = $this->conexion->query($sql) ) {
            // SE OBTIENEN LOS RESULTADOS
			$rows = $result->fetch_all(MYSQLI_ASSOC);

            if(!is_null($rows)) {
                // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
                foreach($rows as $num => $row) {
                    foreach($row as $key => $value) {
                        $this->response[$num][$key] = utf8_encode($value);
                    }
                }
            }
			$result->free();
		} else {
            die('Query Error: '.mysqli_error($this->conexion));
        }
		$this->conexion->close();
    } 
    }
    public function single($id){
        $sql = "SELECT * FROM productos  WHERE id = {$id}";
        if ($result = $this->conexion->query($sql)) {
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
                foreach ($row as $key => $value) {
                    $this->response[$key] = utf8_encode($value);
                }
            }
        } else {
            $this->response['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
        }
        $this->conexion->close();
    }

    public function getResponse()
    {
        return json_encode($this->response, JSON_PRETTY_PRINT);
    }
}
