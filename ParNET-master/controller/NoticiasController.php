<?php

require "../model/NoticiasModel.php";
$flag = $_POST["flag"];
$noticias = new Noticias();
switch ($flag) {
    /**
     * DEVUELVE TODOS LOS REGISTROS
     */
    case 1:
        $resultado = $noticias->getAllNoticias();
        echo $resultado;
        break;
    /**
     * BORRA UN REGISTRO
     */
    case 2:
        $id_noticias = $_POST["IDNOTICIAS"];
        $resultado = $noticias->deleteNoticia($id_noticias);
        echo $resultado;
        break;
    /**
     * ACTUALIZA UN REGISTRO
     */
    case 3:
        $id_noticias = $_POST["IDNOTICIAS"];
        $titulo = $_POST["TITULO"];
        $texto = $_POST["TEXTO"];
        $autor = $_POST["AUTOR"];
        $fecha_actual = $_POST["FECHA_ACTUAL"];
        $resultado = $noticias->updateNoticia($id_noticias,$titulo, $texto, $autor, $fecha_actual);
        echo $resultado;
        break;
    /**
     * CREA UN REGISTRO
     */
    case 4:
        $id_noticias = $_POST["IDNOTICIAS"];
        $titulo = $_POST["TITULO"];
        $texto = $_POST["TEXTO"];
        $autor = $_POST["AUTOR"];
        $fecha_actual = $_POST["FECHA_ACTUAL"];
        $resultado = $noticias->insertnoticia($id_noticias,$titulo, $texto, $autor, $fecha_actual);
        echo $resultado;
        break;

}

?>