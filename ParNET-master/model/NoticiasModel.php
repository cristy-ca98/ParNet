<?php
require "connection.php";

class Noticias extends DbConnection{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->noticias= Array();
    }

    /**MOSTRAR TODAS LAS NOTICIAS */
    public function getAllNoticias(){
        $sql = "SELECT * FROM NOTICIAS";
        $resultado = mysqli_query($this->conn,$sql)or die (mysqli_error($this->conn));
        if(mysqli_num_rows($resultado)>0){
            while($row = $resultado->fetch_assoc()){
                $this->noticias["data"][]=$row;
            }
            return json_encode($this->noticias);
        }
        else{
            $this->noticias = array("data"=>[]);
            return json_encode($this->noticias);
        }
    }


    /**BUSCAR POR TITULO */
    public function getTitulo($titulo){
        $titulo=$this->conn->real_escape_string($titulo);
        $sql="SELECT * FROM NOTICIAS WHERE TITULO = '$titulo'";
        $resultado=mysqli_query($this->conn,$sql) or die (mysqli_error($this->conn));
        if (mysqli_num_rows($resultado)>0){
            while ($row= $resultado->fetch_assoc()){
                $this->noticias[]=$row;
            }

        }
    }


    /**INSERT */

    public function insertnoticia($id_noticias,$titulo,$texto,$autor,$fecha){
        $id_noticias = $this->conn->real_escape_string($id_noticias);
        $titulo = $this->conn->real_escape_string($titulo);
        $texto = $this->conn->real_escape_string($texto);
        $autor = $this->conn->real_escape_string($autor);
        $fecha = date("Y-m-d H:i:s");
        $sql = "INSERT INTO NOTICIAS (IDNOTICIAS, TITULO, TEXTO, AUTOR, FECHA_ACTUAL VALUES ('$id_noticias','$titulo','$texto', '$autor', '$fecha')";
        $resultado = mysqli_query($this->conn,$sql) or die (mysqli_error($this->conn));
        if(mysqli_affected_rows($this->conn)){
            return "Exito al insertar";
        }
    }

    public function deleteNoticia($id_noticias){
        $id_noticias = $this->conn->real_escape_string($id_noticias);
        $sql = "DELETE FROM NOTICIAS WHERE IDNOTICIAS = '$id_noticias'";
        $resultado = mysqli_query($this->conn,$sql) or die (mysqli_error($this->conn));
        if($resultado){
            return "Exito al borrar la noticia con id: '$id_noticias'";
        }
    }

    public function updateNoticia($id_noticias,$titulo,$texto,$autor,$fecha){
        $id_noticias = $this->conn->real_escape_string($id_noticias);
        $titulo = $this->conn->real_escape_string($titulo);
        $texto = $this->conn->real_escape_string($texto);
        $autor = $this->conn->real_escape_string($autor);
        $fecha = date("Y-m-d H:i:s");
        $sql = "UPDATE NOTICIAS SET TITULO = '$titulo', TEXTO = '$texto',AUTOR = '$autor',FECHA_ACTUAL='$fecha' WHERE IDNOTICIAS = '$id_noticias'";
        $resultado = mysqli_query($this->conn,$sql) or die (mysqli_error($this->conn));
        if($resultado){
            return "Exito al actualizar la noticia $id_noticias";
        }
 
    }
    
}
?>