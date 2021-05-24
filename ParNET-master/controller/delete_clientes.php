<?php
include("../model/class_lista_clientes_dal.php");
if(isset($_POST['id'])){
   $id= $_POST['id'];
			$metodos_asuntos=new lista_clientes_dal;
			//$obj_curso=new catalogo_curso($id,NULL);
			$cuantos=$metodos_asuntos->borra_cliente($id);
      echo $cuantos;
}
else{
  echo "no llego correctamente el id, error backend";
}
?>