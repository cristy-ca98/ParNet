<?php
include("../model/class_lista_clientes_dal.php");
if(isset($_POST['id'])){
   $id=  $_POST['id'];
   //echo $id;
      $output='';      
      $metodos_cursos=new lista_clientes_dal;
      $result_cursos=$metodos_cursos->datos_por_id($id);

      
        $idCliente=$result_cursos->getIDCLIENTE();
        $empresa_cliente=utf8_encode($result_cursos->getEMPRESA());
        $direccion_cliente=utf8_encode($result_cursos->getDIRECCION());
        $correo_cliente=utf8_encode($result_cursos->getCORREO());
      

$output .= '  
      <div class="table-responsive">  
           <table class="table table-striped">';  
       
           $output .= '  
                <tr>  
                     <td width="30%"><label>ID CLIENTE:</label></td>  
                     <td width="70%">'.$idCliente.'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>EMPRESA:</label></td>  
                     <td width="70%">'.$empresa_cliente.'</td> 
                </tr> 
                <tr>  
                     <td width="30%"><label>DIRECCIÓN:</label></td>  
                     <td width="70%">'.$direccion_cliente.'</td> 
                </tr>  
                <tr>  
                     <td width="30%"><label>CORREO:</label></td>  
                     <td width="70%">'.$correo_cliente.'</td> 
                </tr> 
           ';
      
      $output .= '  
           </table>  
      </div>  
      ';

       echo $output; 
}
else{
  echo "no llego correctamente el id, error backend,ver id de egreso en modal";
  exit;  
}
?>