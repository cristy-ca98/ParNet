<?php
if (!empty($_POST)){
	require_once '../source/php/funciones_php.php';
	include("../model/class_lista_clientes_dal.php");
	$metodos_cursos=new lista_clientes_dal;

	if (isset($_POST['cliente_id'])){
		$cliente_id=strtoupper($_POST['cliente_id']);
	}else{
		$cliente_id=null;
		echo "no llego dato de Id cliente";
		exit;
	}

	if (isset($_POST['empresa'])){
		$empresa_cliente=strtoupper($_POST['empresa']);
	}else{
		$empresa_cliente=null;
		echo "no llego dato de empresa";
		exit;
	}

    if (isset($_POST['direccion'])){
		$direccion_cliente=strtoupper($_POST['direccion']);
	}else{
		$direccion_cliente=null;
		echo "no llego dato de direccion";
		exit;
	}

    if (isset($_POST['correo'])){
		$correo_cliente=strtoupper($_POST['correo']);
	}else{
		$correo_cliente=null;
		echo "no llego dato de correo";
		exit;
	}

	$errores=array();
	if ($_SERVER['REQUEST_METHOD']=='POST'){

		if (!validaRequerido($empresa_cliente)){
			$errores[]="El campo de empresa esta vacio";
		}
		if (!validaRequerido($direccion_cliente)){
			$errores[]="El campo de direccion esta vacío";
		}
		if (!validaRequerido($correo_cliente)){
			$errores[]="El campo de correo esta vacío";
		}

		if (!$errores){
			$obj_curso=new clientes($cliente_id,$empresa_cliente,$direccion_cliente,$correo_cliente);
			if ($cliente_id==''){

				if($metodos_cursos->insertar_cliente($obj_curso)=="1"){
					echo 'ok';
				}
				else{
					print "Ocurrio un error para ingresar el cliente, intente nuevamente";
				}

			}else{
				if($metodos_cursos->actualiza_cliente($obj_curso)=="1"){
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