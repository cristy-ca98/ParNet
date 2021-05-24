<?php
require "connection.php";

class Contacto extends DbConnection{

    public function __construct(){
        parent::__construct();
        $this->contacto = Array();
    }

    public function createContacto($nombre, $email, $empresa, $telefono){
        $nombre = $this->conn->real_escape_string($nombre);
        $email = $this->conn->real_escape_string($email);
        $empresa = $this->conn->real_escape_string($empresa);
        $telefono = $this->conn->real_escape_string($telefono);
        $sql = "INSERT INTO CONTACTO (NOMBRE_CONTACTO, CORREO_CONTACTO, EMPRESA_CONTACTO, TELEFONO_CONTACTO) VALUES ('$nombre', '$email', '$empresa', $telefono)";
        $ejecucion = mysqli_query($this->conn,$sql) or die (mysqli_error($this->conn));
        if(mysqli_affected_rows($this->conn)){
            return "Exito al insertar";
        }
    }

    public function readContactos(){
        $sql = "SELECT * FROM CONTACTO;";
        $ejecucion = mysqli_query($this->conn,$sql) or die (mysqli_error($this->conn));
        if(mysqli_num_rows($ejecucion) > 0){
            while($row = $ejecucion->fetch_assoc()){
                $this->contacto["data"][] = $row;
            }
            return json_encode($this->contacto);
        }
        return json_encode($this->contacto);
    }

    public function deleteContacto($id){
        $id = $this->conn->real_escape_string($id);
        $sql = "DELETE FROM CONTACTO WHERE ID_CONTACTO = $id";
        $resultado = mysqli_query($this->conn,$sql) or die (mysqli_error($this->conn));
        if($resultado){
            return "Exito al borrar el registro $id";
        }
    }  

    public function updateContacto($id, $nombre, $correo, $empresa, $telefono){
        $id = $this->conn->real_escape_string($id);
        $nombre = $this->conn->real_escape_string($nombre);
        $empresa = $this->conn->real_escape_string($empresa);
        $telefono = $this->conn->real_escape_string($telefono);
        $correo = $this->conn->real_escape_string($correo);
        $sql = "UPDATE CONTACTO SET NOMBRE_CONTACTO = '$nombre' ,EMPRESA_CONTACTO = '$empresa' ,TELEFONO_CONTACTO = $telefono, CORREO_CONTACTO = '$correo' WHERE ID_CONTACTO = '$id'";
        $resultado = mysqli_query($this->conn,$sql) or die (mysqli_error($this->conn));
        if($resultado){
            return "Exito al actualizar el registro $id";
        }
    }
}
?>