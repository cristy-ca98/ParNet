<?php
require "connection.php";

class Usuarios extends DbConnection{

    public function __construct(){
        parent::__construct();
        $this->usuario = Array();
    }

    public function createUsuario($email, $contrasena){
        $email = $this->conn->real_escape_string($email);
        $contrasena = $this->conn->real_escape_string($contrasena);
        $contrasena = md5($contrasena);
        $sql = "INSERT INTO USUARIOS (email, pass_hash) VALUES ('$email', '$contrasena')";
        $ejecucion = mysqli_query($this->conn,$sql) or die (mysqli_error($this->conn));
        if(mysqli_affected_rows($this->conn)){
            return "Exito al insertar";
        }
        return "Fallo Al insertar";
    }

    public function readUsuario($email, $contrasena){
        $email = $this->conn->real_escape_string($email);
        $contrasena = $this->conn->real_escape_string($contrasena);
        $contrasena = md5($contrasena);
        $sql = "SELECT * FROM USUARIOS where email = '$email' AND pass_hash = '$contrasena';";
        $ejecucion = mysqli_query($this->conn,$sql) or die (mysqli_error($this->conn));
        if(mysqli_num_rows($ejecucion) > 0){
            while($row = $ejecucion->fetch_assoc()){
                $this->usuario["data"][] = $row;
            }
            return json_encode($this->usuario);
        }
        return FALSE;
    }

    public function updateUsuario($email, $contrasena, $email_nuevo, $contra_nueva){
        $email = $this->conn->real_escape_string($email);
        $contrasena = $this->conn->real_escape_string($contrasena);
        $contrasena = md5($contrasena);
        $email_nuevo = $this->conn->real_escape_string($email_nuevo);
        $contrasena_nuevo = $this->conn->real_escape_string($contra_nueva);
        $contra_nueva = md5($contra_nueva);
        $sql = "UPDATE USUARIOS SET email = '$email_nuevo', pass_hash = '$contra_nueva' WHERE  email = '$email' AND pass_hash = '$contrasena';";
        $ejecucion = mysqli_query($this->conn,$sql) or die (mysqli_error($this->conn));
        if($ejecucion){
            return "EXITO AL ACTUALIZAR";
        }
        return "FALLO AL ACTUALIZAR";
    }

    public function deleteUsuario($email, $contrasena){
        $email = $this->conn->real_escape_string($email);
        $contrasena = $this->conn->real_escape_string($contrasena);
        $contrasena = md5($contrasena);
        $sql = "DELETE FROM USUARIOS WHERE email = '$email' and pass_hash = '$contrasena';";
        $ejecucion = mysqli_query($this->conn,$sql) or die (mysqli_error($this->conn));
        if($ejecucion){
            return "Exito al borrar el usuario";
        }
        return "fallo al borrar el registro";
    }
}
?>

