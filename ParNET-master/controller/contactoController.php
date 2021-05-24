<?php
require "../model/contactoModel.php";
$flag = $_POST["flag"];
$cont = new Contacto();
switch ($flag) {
    /**
     * DEVUELVE TODOS LOS REGISTROS
     */
    case 1:
        $resultado = $cont->readContactos();
        echo $resultado;
        break;
    /**
     * BORRA UN REGISTRO
     */
    case 2:
        $id = $_POST["id"];
        $resultado = $cont->deleteContacto($id);
        echo $resultado;
        break;
    /**
     * ACTUALIZA UN REGISTRO
     */
    case 3:
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $correo = $_POST["email"];
        $empresa = $_POST["empresa"];
        $telefono = $_POST["telefono"];
        $resultado = $cont->updateContacto($id,$nombre,$correo, $empresa, $telefono);
        echo $resultado;
        break;
    /**
     * CREA UN REGISTRO
     */
    case 4:
        $nombre = $_POST["nombre"];
        $correo = $_POST["email"];
        $empresa = $_POST["empresa"];
        $telefono = $_POST["telefono"];
        $resultado = $cont->createContacto($nombre, $correo, $empresa, $telefono);
        echo $resultado;
        break;

}
?>