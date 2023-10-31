<?php
	include('../../controller/tramites/funciones_tramites.php');
	
	if(update_status_usuario($_POST['id'], $_POST['status']))
	{
		if(update_status_estudiante($_POST['id'], $_POST['status']))
		{
			$mensaje = "correcto";
		}else{
			$mensaje = "error";	
		}
	}else{
		$mensaje = "error1";
	}

	echo $mensaje;