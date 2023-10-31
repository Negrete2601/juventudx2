<?php
	include('../../controller/tramites/funciones_tramites.php');
	//tipo: 0:rechazo; 1:aprobado
	//comp: (motivo rechazo o secretraria asignada)	
	if(update_status_tramite($_POST['id'], $_POST['tipo']))
	{
		if($_POST['tipo'] == 1)
		{
			if(update_area_tramite($_POST['id'], $_POST['comp']))
			{
				if(update_etapa_tramite($_POST['id'], 1))
				{
					$mensaje = "correcto";
				}else{
					$mensaje = "error";
				}				
			}else{
				$mensaje = "error1";
			}
		}else{
			if(update_observaciones_tramite($_POST['id'], $_POST['comp']))
			{
				$mensaje = "correcto";
			}else{
				$mensaje = "error2";
			}
		}
	}else{
		$mensaje = "error3";
	}
echo $mensaje;