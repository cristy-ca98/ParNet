<?php
require "connection.php";

class ProductoModel extends DBConnection{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->producto = array();
    }

    /**INVENTARIO */

    public function getAllProductos(){
        $sql = "SELECT * FROM PRODUCTOS";
        $resultado = mysqli_query($this->conn,$sql) or die (mysqli_error($this->conn));
        if (mysqli_num_rows($resultado)>0){
            while($row = $resultado->fetch_assoc()) {
                $this->producto["data"][]= $row;
            }
            return json_encode($this->producto);
        }
        else{
            $this->producto= array("data"=>[]);
            return json_encode($this->producto);
        } 
    }


    /**BUSQUEDA POR NOMBRE */
    public function getProducto($nombre)
    {
        $nombre = $this->conn->real_escape_string($nombre);
        $sql = "SELECT * FROM PRODUCTOS WHERE NOMBRE = '$nombre'";
        $resultado = mysqli_query($this->conn,$sql) or die (mysqli_error($this->conn));
        if (mysqli_num_rows($resultado)>0){
            while($row = $resultado->fetch_assoc()) {
                $this->producto[]=$row;
            }
            return json_encode($this->producto);
        }
        else{
            $this->producto= array("data"=>[]);
            return json_encode($this->producto);
        }
    }

    /**INSERTAR PRODUCTO */
    public function setProducto($id_producto, $tipo, $nombre, $precio, $imagen, $cantidad)
    {
        $id_producto = $this->conn->real_escape_string($id_producto);
        $tipo = $this->conn->real_escape_string($tipo);
        $nombre= $this->conn->real_escape_string($nombre);
        $precio= $this->conn->real_escape_string($precio);
        $imagen = $this->conn->real_escape_string($imagen);
        $cantidad = $this->conn->real_escape_string($cantidad);
        $sql = "INSERT INTO PRODUCTOS (ID_PRODUCTO, TIPO, NOMBRE, PRECIO, IMAGEN, CANTIDAD
            VALUES ('$id_producto','$tipo','$nombre', '$precio', '$imagen', '$cantidad')";
        $resultado = mysqli_query($this->conn,$sql) or die (mysqli_error($this->conn));
        if(mysqli_affected_rows($this->conn)){
            return "Exito al insertar";
        }
    }
    /**BORRAR PRODUCTO */
    public function deleteProducto($id_producto)
    {
        $id_producto = $this->conn->real_escape_string($id_producto);
        $sql = "DELETE FROM PRODUCTOS WHERE ID_PRODUCTO= '$id_producto'";
        $resultado = mysqli_query($this->conn,$sql) or die (mysqli_error($this->conn));
        if($resultado){
            return "Exito al borrar producto con ID: '$id_producto'";
        }
    }

    /**ACTUALIZAR PRODUCTO */
    public function updateProducto($id_producto, $tipo, $nombre, $precio, $imagen, $cantidad)
    {
        $id_producto = $this->conn->real_escape_string($id_producto);
        $tipo = $this->conn->real_escape_string($tipo);
        $nombre= $this->conn->real_escape_string($nombre);
        $precio= $this->conn->real_escape_string($precio);
        $imagen = $this->conn->real_escape_string($imagen);
        $cantidad = $this->conn->real_escape_string($cantidad);
        $sql = "UPDATE PRODUCTOS SET TIPO = '$tipo',NOMBRE = '$tipo',PRECIO = '$precio',IMAGEN = '$imagen',CANTIDAD = '$cantidad' WHERE ID_PRODUCTO = '$id_producto'";
        $resultado = mysqli_query($this->conn,$sql) or die (mysqli_error($this->conn));
        if($resultado){
            return "Exito al actualizar el producto con ID: $id_producto";
        }
    }


}

?>