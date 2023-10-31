<?php
include('../../controller/tramites/funciones_tramites.php');
if(create_horas($_POST['id'], $_POST['horas']))
{
	$mensaje = "correcto";
}else{
	$mensaje = "error";
}
echo $mensaje;