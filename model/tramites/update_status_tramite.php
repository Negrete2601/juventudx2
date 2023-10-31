<?php
include('../../controller/tramites/funciones_tramites.php');

if(update_status_tramite($_POST['id'], $_POST['status']))
{
	$mensaje = "correcto";
}else{
	$mensaje = "error";
}
echo $mensaje;