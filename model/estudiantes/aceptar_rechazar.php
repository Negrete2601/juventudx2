<?php
	//tipo: 1:aceptado; 0:rechazado
	include('../../controller/tramites/funciones_tramites.php');
	if(update_status_usuario($_POST['id_estudiante'], $_POST['tipo']))
	{
		$mensaje = "correcto";
	}else{
		$mensaje = "error";
	}
	echo $mensaje;
