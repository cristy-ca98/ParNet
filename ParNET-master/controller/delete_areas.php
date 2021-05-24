<?php
include("../model/class_catalogo_areas_dal.php");
if(isset($_POST['id'])){
   $id= $_POST['id'];
			$metodos_asuntos=new catalogo_area_dal;
			//$obj_curso=new catalogo_curso($id,NULL);
			$cuantos=$metodos_asuntos->borra_area($id);
      echo $cuantos;
}
else{
  echo "no llego correctamente el id, error backend";
}
?>