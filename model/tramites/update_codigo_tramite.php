<?php
include('../../controller/tramites/funciones_tramites.php');

if(update_codigo_tramite($_POST['id'], $_POST['codigo']))
{
	$mensaje = "correcto";
}else{
	$mensaje = "error";
}
echo $mensaje;