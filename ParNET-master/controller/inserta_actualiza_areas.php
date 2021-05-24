<?php
if (!empty($_POST)){
	require_once '../source/php/funciones_php.php';
	include("../model/class_catalogo_areas_dal.php");
	$metodos_cursos=new catalogo_area_dal;

	if (isset($_POST['curso_id'])){
		$curso_id=strtoupper($_POST['curso_id']);
	}else{
		$curso_id=null;
		echo "no llego dato de curso Id";
		exit;
	}

	if (isset($_POST['f_nombre'])){
		$nombre_curso=strtoupper($_POST['f_nombre']);
	}else{
		$nombre_curso=null;
		echo "no llego dato de nombre curso";
		exit;
	}

	$errores=array();
	if ($_SERVER['REQUEST_METHOD']=='POST'){

		if (!validaRequerido($nombre_curso)){
			$errores[]="El campo de nombre de curso esta vacio";
		}

		if (!$errores){
			$obj_curso=new catalogo_area($curso_id,$nombre_curso);
			if ($curso_id==''){

				if($metodos_cursos->insertar_area($obj_curso)=="1"){
					echo 'ok';
				}
				else{
					print "Ocurrio un error para ingresar el curso, intente nuevamente";
				}

			}else{
				if($metodos_cursos->actualiza_area($obj_curso)=="1"){
					echo 'ok';
				}
				else{
					print "Ocurrio un error para actualizar el curso, intente nuevamente";
				}
			}





		}else{
			echo '<ul style="color: #f00;font-size:25px;">';
      		foreach ($errores as $error):
         	echo '<li>'.$error.'</li>';
      		endforeach;
   			echo '</ul>';
		}



	}
	else{
		print "no ocurrio el request method";
	}


}
else{
	echo 'Error de post, los datos no llegaron correctamente ';
}

?>