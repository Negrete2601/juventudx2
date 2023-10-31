<?php
	include('../../controller/tramites/funciones_tramites.php');

	$compare = compare_estudiante($_POST['curp']);
	if($compare == 0)
	{
		if(create_estudiante($_POST['name'], $_POST['apaterno'], $_POST['amaterno'], $_POST['edad'], $_POST['fecha_nac'], $_POST['lugar'], $_POST['curp'], $_POST['calle'], $_POST['no_int'], $_POST['no_ext'], $_POST['colonia'], $_POST['c_p'], $_POST['tel'], $_POST['email'], $_POST['face']))
		{
			$nombre = $_POST['name'].' '.$_POST['apaterno'].' '.$_POST['amaterno'];
			$usuario = $_POST['curp'];
			$psw = md5($_POST['password']);
			$id_tipo = 5;//Tipo estudiante
			$status = 0;
			if(create_usuario($nombre, $usuario, $psw, $id_tipo, $status))
			{
				$mensaje = "correcto";
			}else{
				$mensaje = "error";
			}
		}else{
			$mensaje = "error1";
		}
	}else{
		$mensaje = "error2";
	}
echo $mensaje;