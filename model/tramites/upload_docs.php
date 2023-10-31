<?php   
	include('../../controller/tramites/funciones_tramites.php');
	if($_POST['etapa'] == 1)
	{
		$etapa = 2;
	}else{
		$etapa = 3;
	}
	$j = count($_FILES)-1;

	$ruta = "../../assets/estudiantes/".$_POST['id_estudiante']."/".$_POST['id_tramite'];
	if(!is_dir($ruta))
	{
		mkdir($ruta,0777, true);
	}
	for ($i=0; $i < $j; $i++)
	{			
		$archivo = $ruta.'/'.basename($_FILES[$i]['name']);	
		if(move_uploaded_file($_FILES[$i]['tmp_name'], $archivo))
		{
			$mensaje = "correcto";
		}else{
			$mensaje = "error";
		}
	}
	if($mensaje == "correcto")
	{
		if(update_etapa_tramite($_POST['id_tramite'], $etapa))
		{
			$mensaje = "correcto";
		}else{
			$mensaje = "error2";
		}
	}
	
	echo $mensaje;