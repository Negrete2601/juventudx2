<?php
include('../../controller/tramites/funciones_tramites.php');

function fill_tramites_estudiante($curp)
{
	$id_estudiante = get_id_estudiante($curp);
	$tramites = get_tramite_estudiante($id_estudiante['id']);
	return $tramites;
}

function fill_tr_tramites($tramites)
{
	$tr_tramites = $tipo = $etapa = $pdf= "";
	foreach ($tramites as $tramite) 
	{
		if($tramite['tipo'] == 0)
		{
			$tipo = "Servicio Social";
		}else{
			$tipo = "Prácticas Profesionales";
		}

		if($tramite['etapa'] == 0)
		{
			$etapa = "Carta de Presentación";
			$label = "warning";
			$pdf = '';
		}
		if($tramite['etapa'] == 1)
		{
			$etapa = "Carta de Aceptación";
			$label = "pink";
			$pdf = '<button class="btn btn-xs btn-danger" onclick="fill_modal_fill_datos('.$tramite['id'].')" role="button" data-toggle="modal" title="Descargar Carta de Aceptación">
						<i class="ace-icon fa fa-file-pdf-o bigger-130"></i>
					</button>
			
			
			';
		}
		if($tramite['etapa'] == 2)
		{
			$etapa = "En Proceso";
			$label = "info";
			$pdf = '';
		}
		if($tramite['etapa'] == 3)
		{
			$etapa = "Carta de Liberación";
			$label = "success";
			$pdf = '<button class="btn btn-xs btn-danger" onclick="fill_modal_fill_datos2('.$tramite['id'].')" role="button" data-toggle="modal" title="Descargar Carta de Liberación">
			<i class="ace-icon fa fa-file-pdf-o bigger-130"></i>
		</button>
			';
		}

		if($tramite['status'] == 2)
		{
			$etapa = "Rechazado";
			$label = "danger";
			$pdf = '';
		}
		$tr_tramites.='<tr>
						<td>'.$tramite['escuela'].'</td>
						<td>'.$tramite['especialidad'].'</td>
						<td>'.$tipo.'</td>
						<td>'.$tramite['area'].'</td>
						<td>'.$tramite['realizado'].'</td>
						<td><span class="label label-'.$label.' arrowed-right">'.$etapa.'</span></td>
						<td class="center">
							<div class="btn-group">
								<a class="btn btn-xs btn-info" onclick="fill_modal_info('.$tramite['id'].')" role="button" data-toggle="modal" title="Información del trámite">
									<i class="ace-icon fa fa-info-circle bigger-130"></i>
								</a>
								' .$pdf.'
							</div>
						</td>
						</tr>

		';
	}
	return $tr_tramites;
}

function fill_tramites_pendientes()
{
	$tramites = get_tramites_pendientes();
	return $tramites;
}

function fill_tramites_proceso()
{
	$tramites = get_tramites_proceso();
	return $tramites;
}

function fill_tramites_atendidos()
{
	$tramites = get_tramites_atendidos();
	return $tramites;
}

function fill_tr_tramites_admin($tramites)
{
	$tr_tramites = $tipo = $etapa = "";

	foreach ($tramites as $tramite) 
	{
		if(!isset($tramite['horas_realizadas']))
		{
			$tramite['horas_realizadas'] = 0;	
		}
		$nombre = "'".$tramite['nombre']." ".$tramite['paterno']." ".$tramite['materno']."'";
		if($tramite['tipo'] == 0)
		{
			$tipo = "Servicio Social";
		}else{
			$tipo = "Prácticas Profesionales";
		}

		if($tramite['etapa'] == 0)
		{
			$etapa = "Carta de Presentación";
			$label = "warning";
			$botones = '<td class="center">
							<div class="btn-group">
								<a class="btn btn-xs btn-info" onclick="fill_modal_info('.$tramite['id'].')" role="button" data-toggle="modal" title="Información del trámite">
									<i class="ace-icon fa fa-info-circle bigger-130"></i>
								</a>								
							</div>
						</td>
			';
		}
		if($tramite['etapa'] == 1)
		{
			$etapa = "Carta de Aceptación";
			$label = "pink";
			$botones = '<td class="center">
							<div class="btn-group">
								<a class="btn btn-xs btn-info" onclick="fill_modal_info('.$tramite['id'].')" role="button" data-toggle="modal" title="Información del trámite">
									<i class="ace-icon fa fa-info-circle bigger-130"></i>
								</a>
								<a class="btn btn-xs btn-success" onclick="fill_modal_update_docs('.$tramite['id'].', '.$tramite['id_estudiante'].', '.$nombre.', '.$tramite['etapa'].')" role="button" data-toggle="modal" title="Carga de documentos">
									<i class="ace-icon fa fa-upload bigger-130"></i>
								</a>
							</div>
						</td>
			';
		}
		if($tramite['etapa'] == 2)
		{
			$etapa = "En Proceso";
			$label = "info";			
			$botones = '<td class="center">
							<div class="btn-group">
								<a class="btn btn-xs btn-info" onclick="fill_modal_info('.$tramite['id'].')" role="button" data-toggle="modal" title="Información del trámite">
									<i class="ace-icon fa fa-info-circle bigger-130"></i>
								</a>
														
			';

			if($tramite['horas'] == $tramite['horas_realizadas'])
			{
				$botones.='
								<a class="btn btn-xs btn-success" onclick="fill_modal_update_docs('.$tramite['id'].', '.$tramite['id_estudiante'].', '.$nombre.', '.$tramite['etapa'].')" role="button" data-toggle="modal">
									<i class="ace-icon fa fa-upload bigger-130" title="Carga de documentos"></i>
								</a>
							</div>
						</td>
				';
			}else{
				$botones.='
								<a class="btn btn-xs btn-warning" onclick="fill_modal_fill_hr('.$tramite['id'].', '.$tramite['id_estudiante'].', '.$nombre.')" role="button" data-toggle="modal" title="Carga de horas">
									<i class="ace-icon fa fa-tachometer bigger-130"></i>
								</a>	
							</div>
						</td>
				';
			}
		}
		if($tramite['etapa'] == 3)
		{
			$etapa = "Carta de Liberación";
			$label = "success";
			$botones = '<td class="center">
							<div class="btn-group">
								<a class="btn btn-xs btn-info" onclick="fill_modal_info('.$tramite['id'].')" role="button" data-toggle="modal" title="Información del trámite">
									<i class="ace-icon fa fa-info-circle bigger-130"></i>
								</a>								
							</div>
						</td>
			';
		}
		if($tramite['status'] == 2)
		{
			$etapa = "Rechazado";
			$label = "danger";
			$botones = '<td class="center">
							<div class="btn-group">
								<a class="btn btn-xs btn-info" onclick="fill_modal_info('.$tramite['id'].')" role="button" data-toggle="modal" title="Información del trámite">
									<i class="ace-icon fa fa-info-circle bigger-130"></i>
								</a>								
							</div>
						</td>
			';
		}
//imprimir telefono en la tabla '.$tramite['telefono'].'
		$tr_tramites.='<tr>
						<td>'.$tramite['nombre'].' '.$tramite['paterno'].' '.$tramite['materno'].'</td>
						<td>'.$tramite['escuela'].'</td>
						<td>'.$tipo.'</td>
						<td>'.$tramite['area'].'</td>
						<td>'.$tramite['horas_realizadas'].' / '.$tramite['horas'].'</td>						
						<td><span class="label label-'.$label.' arrowed-right">'.$etapa.'</span></td>
						'.$botones.'
					</tr>
		';
	}
	return $tr_tramites;
}

function fill_tramite_id($id)
{
	$tramite = get_tramites_id($id);
	return $tramite;
}

function fill_estudiante_id($id)
{
	$estudiante = get_estudiante_id($id);
	return $estudiante;
}

function fill_documentos($id_tramite, $id_estudiante)
{
	$ruta = "../../assets/estudiantes/".$id_estudiante."/".$id_tramite;
	$div_archivos = "";
	if(is_dir($ruta))
	{
		$archivos = scandir($ruta);		
		foreach ($archivos as $archivo) 
		{
			$ruta="assets/estudiantes/".$id_estudiante."/".$id_tramite."/".$archivo;
			if($archivo!= "." && $archivo != "..")
			{
				$div_archivos.='
								<a href="'.$ruta.'" target="_blank">
									<div class="archivo_flex">
					                    <div style="text-align: center;">
					                        <span id="span" style="font-size: 3.5em;">
					                            <i class="obligaciones-pdf"></i>
					                        </span>
					                    </div>

					                    <div style="text-align: center;">
					                        <span style="font-size: 1em;">'.$archivo.'</span>
					                    </div>
			                        </div>
			                    </a>
								';
			}
		}	
	}
	
	return $div_archivos;
}