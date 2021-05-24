<?php
require "../model/servicioModel.php";
$flag = $_POST["flag"];
$serv = new Servicios();
switch ($flag) {
    /**
     * DEVUELVE TODOS LOS REGISTROS
     */
    case 1:
        $resultado = $serv->readServicios();
        echo $resultado;
        break;
    /**
     * BORRA UN REGISTRO
     */
    case 2:
        $id = $_POST["id"];
        $resultado = $serv->deleteServicios($id);
        echo $resultado;
        break;
    /**
     * ACTUALIZA UN REGISTRO
     */
    case 3:
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $area = $_POST["area"];
        $descripcion = $_POST["descripcion"];
        $resultado = $serv->updateServicios($id,$nombre, $area, $descripcion);
        echo $resultado;
        break;
    /**
     * CREA UN REGISTRO
     */
    case 4:
        $nombre = $_POST["nombre"];
        $area = $_POST["area"];
        $descripcion = $_POST["descripcion"];
        $resultado = $serv->createServicios($nombre, $area, $descripcion);
        echo $resultado;
        break;

}

?>