<?php
include("../model/class_lista_clientes_dal.php");
if(isset($_POST['cliente_id'])){
   $id=  $_POST['cliente_id'];
   //echo $id;
      $output='';      
      $metodos_cursos=new lista_clientes_dal;
      $result_cursos=$metodos_cursos->datos_por_id($id);
      //foreach ($result_cursos as $key => $value) {
        $arreglo=array(
        "IDCliente"=>$result_cursos->getIDCLIENTE(),
        "Empresa"=>$result_cursos->getEMPRESA(),
        "Direccion"=>$result_cursos->getDIRECCION(),
        "Correo"=>$result_cursos->getCORREO()
        );


//}
      $arreglo = array_map('utf8_encode',$arreglo);
      echo json_encode($arreglo,JSON_UNESCAPED_UNICODE);
}
else{
  echo "no llego correctamente el id, error backend,ver id de egreso en modal";
  exit;  
}
?>