<?php
include("../model/class_catalogo_areas_dal.php");
if(isset($_POST['curso_id'])){
   $id=  $_POST['curso_id'];
   //echo $id;
      $output='';      
      $metodos_cursos=new catalogo_area_dal;
      $result_cursos=$metodos_cursos->datos_por_id($id);
      //foreach ($result_cursos as $key => $value) {
        $arreglo=array(
        "IDArea"=>$result_cursos->getIDAREA(),
        "nombre_area"=>$result_cursos->getNOMBREAREA()
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