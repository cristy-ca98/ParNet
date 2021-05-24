<?php
require "connection.php";
class ClienteModel extends DbConnection{

    /**
     * CONSTRUCTOR CREA ARREGLO DE DATOS
     */
    public function __construct()
    {
        parent::__construct();
        $this->Cliente = array();
    }

    /**
     * METODO PARA MOSTRAR TODOS LOS REGISTROS DE Cliente
     */
    public function getAllClientes(){
        $sql = "SELECT * FROM CLIENTE";
        $resultado = mysqli_query($this->conn,$sql) or die (mysqli_error($this->conn));
        if (mysqli_num_rows($resultado)>0){
            while($row = $resultado->fetch_assoc()) {
                $this->Cliente["data"][]= $row;
            }
            return json_encode($this->Cliente);
        }
        else{
            $this->Cliente= array("data"=>[]);
            return json_encode($this->Cliente);
        } 
    }
    
    /**
     *METODO PARA INSERTAR DATOS 
     */
    public function setCliente($empresa, $direccion, $correo)
    {
        $empresa = $this->conn->real_escape_string($empresa);
        $direccion = $this->conn->real_escape_string($direccion);
        $correo = $this->conn->real_escape_string($correo);
        $sql = "INSERT INTO CLIENTE (EMPRESA, DIRECCION, CORREO)
                VALUES ('$empresa','$direccion','$correo')";
        $resultado = mysqli_query($this->conn,$sql) or die (mysqli_error($this->conn));
        if(mysqli_affected_rows($this->conn)){
            return "Exito al insertar cliente";
        }
    }

    /**
     * METODO PARA BORRAR
     */
    public function deleteCliente($idCliente)
    {
        $idCliente = $this->conn->real_escape_string($idCliente);
        $sql = "DELETE FROM CLIENTE WHERE ID_Cliente = '$idCliente'";
        $resultado = mysqli_query($this->conn,$sql) or die (mysqli_error($this->conn));
        if($resultado){
            return "Exito al borrar el registro $idCliente";
        }
    }

    /**
     * METODO PARA ACTUALIZAR
     */
    public function updateCliente($idCliente, $empresa, $direccion, $correo)
    {
        $empresa = $this->conn->real_escape_string($empresa);
        $idCliente = $this->conn->real_escape_string($idCliente);
        $direccion = $this->conn->real_escape_string($direccion);
        $correo = $this->conn->real_escape_string($correo);
        $sql = "UPDATE CLIENTE SET EMPRESA = '$empresa', DIRECCION = '$direccion', CORREO = '$correo' WHERE ID_CLIENTE = '$idCliente'";
        $resultado = mysqli_query($this->conn,$sql) or die (mysqli_error($this->conn));
        if($resultado){
            return "Exito al actualizar el registro $idCliente";
        }
    }
}
?>