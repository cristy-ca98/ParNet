<?php
    require "../model/ClienteModel.php";
    $flag = $_POST["flag"];
    $curso = new ClienteModel();
    switch($flag){
        /**LISTADO DE CLIENTE */
        case 1:
            $resultado = $curso->getAllClientes();
            echo $resultado;
            break;

        /** BORRAR CLIENTE*/
        case 2:
            $idCliente = $_POST["iIdCliente"];
            $resultado = $curso->deleteCliente($idCliente);
            echo $resultado;
            break;
        
            /**ACTUALIZA CLIENTE */
        case 3:
            $idCliente = $_POST["iIdCliente"];
            $empresa = $_POST["iIdEmpresa"];
            $direccion = $_POST["iDireccion"];
            $correo = $_POST["iCorreo"];
            $resultado = $curso->updateCliente($idCliente, $empresa, $direccion, $correo);
            echo $resultado;
            break;
        
            //**INSERTAR CLIENTE */
        case 4:
            $empresa = $_POST["iIdEmpresa"];
            $direccion = $_POST["iDireccion"];
            $correo = $_POST["iCorreo"];
            $resultado = $curso->setCliente($empresa, $direccion, $correo);
            echo $resultado;
            break;
    }
?>