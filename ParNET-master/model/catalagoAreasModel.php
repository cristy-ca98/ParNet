<?php
require "connection.php";
class CatalogoAreasModel extends DbConnection{

    /**
     * CONSTRUCTOR CREA ARREGLO DE DATOS
     */
    public function __construct()
    {
        parent::__construct();
        $this->Catalogo_Areas = array();
    }

    /**
     * METODO PARA MOSTRAR TODOS LOS REGISTROS DE Catalogo_Areas
     */
    public function getAllCatalogoAreas(){
        $sql = "SELECT * FROM CATALOGO_AREAS";
        $resultado = mysqli_query($this->conn,$sql) or die (mysqli_error($this->conn));
        if (mysqli_num_rows($resultado)>0){
            while($row = $resultado->fetch_assoc()) {
                $this->Catalogo_Areas["data"][]= $row;
            }
            return json_encode($this->Catalogo_Areas);
        }
        else{
            $this->Catalogo_Areas= array("data"=>[]);
            return json_encode($this->Catalogo_Areas);
        } 
    }
    
    /**
     *METODO PARA INSERTAR DATOS 
     */
    public function setCatalogoAreas($nombreArea)
    {
        $nombre = $this->conn->real_escape_string($nombreArea);
        $sql = "INSERT INTO CATALOGO_AREAS (NOMBRE_AREA)
                VALUES ('$nombreArea')";
        $resultado = mysqli_query($this->conn,$sql) or die (mysqli_error($this->conn));
        if(mysqli_affected_rows($this->conn)){
            return "Exito al insertar area";
        }
    }

    /**
     * METODO PARA BORRAR
     */
    public function deleteCatalogoAreas($idArea)
    {
        $idArea = $this->conn->real_escape_string($idArea);
        $sql = "DELETE FROM CATALOGO_AREAS WHERE ID_AREA = '$idArea'";
        $resultado = mysqli_query($this->conn,$sql) or die (mysqli_error($this->conn));
        if($resultado){
            return "Exito al borrar el registro $idArea";
        }
    }

    /**
     * METODO PARA ACTUALIZAR
     */
    public function updateCatalogoAreas($idArea,$nombreArea)
    {
        $nombreArea = $this->conn->real_escape_string($nombreArea);
        $idArea = $this->conn->real_escape_string($idArea);
        $sql = "UPDATE CATALOGO_AREAS SET NOMBRE_AREA = '$nombreArea' WHERE ID_AREA = '$idArea'";
        $resultado = mysqli_query($this->conn,$sql) or die (mysqli_error($this->conn));
        if($resultado){
            return "Exito al actualizar el registro $idArea";
        }
    }
}
?>