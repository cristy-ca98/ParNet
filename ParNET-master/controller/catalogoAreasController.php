<?php
    require "../model/catalagoAreasModel.php";
    $flag = $_POST["flag"];
    $curso = new CatalogoAreasModel();
    switch($flag){
        /**LISTADO DE CATALOGO CUPRSOS */
        case 1:
            $resultado = $curso->getAllCatalogoAreas();
            echo $resultado;
            break;

        /** BORRAR CATALOGO CUPRSOS*/
        case 2:
            $idArea = $_POST["iIdArea"];
            $resultado = $curso->deleteCatalogoAreas($idArea);
            echo $resultado;
            break;
        
            /**ACTUALIZA CATALOGO CURSO */
        case 3:
            $idArea = $_POST["iIdArea"];
            $nombreArea = $_POST["iNombreArea"];
            $resultado = $curso->updateCatalogoAreas($idArea,$nombreArea);
            echo $resultado;
            break;
        
            //**INSERTAR CATALOGO CURSO */
        case 4:
            $nombreArea = $_POST["iNombreArea"];
            $resultado = $curso->setCatalogoAreas($nombreArea);
            echo $resultado;
            break;
    }
?>