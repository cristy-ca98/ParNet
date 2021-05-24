<?php
include("../model/class_catalogo_areas_dal.php");
if(isset($_POST['id'])){
   $id=  $_POST['id'];
   //echo $id;
      $output='';      
      $metodos_cursos=new catalogo_area_dal;
      $result_cursos=$metodos_cursos->datos_por_id($id);

      
        $idCurso=$result_cursos->getIDAREA();
        $nombreCurso=utf8_encode($result_cursos->getNOMBREAREA());
      

$output .= '  
      <div class="table-responsive">  
           <table class="table table-striped">';  
       
           $output .= '  
                <tr>  
                     <td width="30%"><label>ID Curso:</label></td>  
                     <td width="70%">'.$idCurso.'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Nombre Curso:</label></td>  
                     <td width="70%">'.$nombreCurso.'</td>  
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