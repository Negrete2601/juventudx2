<?php
include('../../controller/tramites/funciones_tramites.php');

$area = $_POST['secre'][0].', '.$_POST['secre'][1].', '.$_POST['secre'][2];

$id_tramite =0;
$id_estudiante = get_id_estudiante($_POST['curp']);
$id_tramite = create_tramite($id_estudiante['id'], $_POST['escuela'], $_POST['especialidad'], $_POST['modalidad'], $_POST['horario'], $_POST['tipo'], $_POST['horas'], $_POST['discapacidad'], $_POST['cual'], $_POST['observaciones'], 0, ' ', $area);
if($id_tramite)
{
	if(create_horas($id_tramite, 0))
	{
		$mensaje = "correcto";
	}else{
		$mensaje = "error";
	}
}else{
	$mensaje = "error1";
}
echo $mensaje;