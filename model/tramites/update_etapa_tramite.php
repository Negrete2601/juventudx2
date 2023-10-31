<?php
include('../../controller/tramites/funciones_tramites.php');

if(update_etapa_tramite($_POST['id'], $_POST['etapa']))
{
	$mensaje = "correcto";
}else{
	$mensaje = "error";
}
echo $mensaje;