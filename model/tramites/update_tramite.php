<?php
include('../../controller/tramites/funciones_tramites.php');

if(update_tramite($_POST['id'], $_POST['escuela'], $_POST['especialidad'], $_POST['modalidad'], $_POST['horario'], $_POST['tipo'], $_POST['horas'], $_POST['discapacidad'], $_POST['cual'], $_POST['observaciones'], $_POST['area']))
{
	$mensaje = "correcto";
}else{
	$mensaje = "error";
}
echo $mensaje;