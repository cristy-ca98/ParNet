<?php
require "connection.php";

class Servicios extends DbConnection{

    public function __construct(){
        parent::__construct();
        $this->servicio = Array();
    }

    public function createServicios($nombre, $id_area, $detalle){
        $nombre = $this->conn->real_escape_string($nombre);
        $id_area = $this->conn->real_escape_string($id_area);
        $detalle = $this->conn->real_escape_string($detalle);
        $sql = "INSERT INTO SERVICIOS (NOMBRE_SERVICIO, ID_AREA, DETALLE) VALUES ('$nombre', $id_area, '$detalle')";
        $ejecucion = mysqli_query($this->conn,$sql) or die (mysqli_error($this->conn));
        if(mysqli_affected_rows($this->conn)){
            return "Exito al insertar";
        }
    }

    public function readServicios(){
        $sql = "SELECT * FROM SERVICIOS;";
        $ejecucion = mysqli_query($this->conn,$sql) or die (mysqli_error($this->conn));
        if(mysqli_num_rows($ejecucion) > 0){
            while($row = $ejecucion->fetch_assoc()){
                $this->servicio["data"][] = $row;
            }
            return json_encode($this->servicio);
        }
        $this->servicio= array("data"=>[]);
        return json_encode($this->servicio);
    }

    public function deleteServicios($id){
        $id = $this->conn->real_escape_string($id);
        $sql = "DELETE FROM SERVICIOS WHERE ID_SERVICIO = $id";
        $resultado = mysqli_query($this->conn,$sql) or die (mysqli_error($this->conn));
        if($resultado){
            return "Exito al borrar el registro $id";
        }
    }  

    public function updateServicios($id, $nombre, $id_area, $detalle){
        $nombre = $this->conn->real_escape_string($nombre);
        $id_area = $this->conn->real_escape_string($id_area);
        $detalle = $this->conn->real_escape_string($detalle);
        $sql = "UPDATE SERVICIOS SET NOMBRE_SERVICIO = '$nombre', ID_AREA = '$id_area', DETALLE = '$detalle' WHERE ID_SERVICIO = '$id'";
        $resultado = mysqli_query($this->conn,$sql) or die (mysqli_error($this->conn));
        if($resultado){
            return "Exito al actualizar el registro $id";
        }
    }
}
?>