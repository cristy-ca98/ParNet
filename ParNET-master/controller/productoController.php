<?php

require "../model/productoModel.php";
$flag = $_POST["flag"];
$producto = new ProductoModel();
switch ($flag) {
    /**
     * DEVUELVE TODOS LOS REGISTROS
     */
    case 1:
        $resultado = $producto->getAllProductos();
        echo $resultado;
        break;
    /**
     * BORRA UN REGISTRO
     */
    case 2:
        $id_producto = $_POST["ID_PRODUCTO"];
        $resultado = $producto->deleteProducto($id_producto);
        echo $resultado;
        break;
    /**
     * ACTUALIZA UN REGISTRO
     */
    case 3:
        $id_producto = $_POST["ID_PRODUCTO"];
        $tipo = $_POST["TIPO"];
        $nombre = $_POST["NOMBRE"];
        $precio = $_POST["PRECIO"];
        $imagen = $_POST["IMAGEN"];
        $cantidad = $_POST["CANTIDAD_ACTUAL"];
        $resultado = $producto->updateProducto($id_producto,$tipo, $nombre, $precio, $imagen, $cantidad);
        echo $resultado;
        break;
    /**
     * CREA UN REGISTRO
     */
    case 4:
        $id_producto = $_POST["ID_PRODUCTO"];
        $tipo = $_POST["TIPO"];
        $nombre = $_POST["NOMBRE"];
        $precio = $_POST["PRECIO"];
        $imagen = $_POST["IMAGEN"];
        $cantidad = $_POST["CANTIDAD_ACTUAL"];
        $resultado = $producto->setProducto($id_producto,$tipo, $nombre, $precio, $imagen, $cantidad);
        echo $resultado;
        break;

}

?>