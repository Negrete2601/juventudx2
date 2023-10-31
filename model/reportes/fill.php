<?php
include('../../controller/tramites/funciones_tramites.php');

function fill_filtros()
{
	$filtros = get_filtros();
	return $filtros;
}

function fill_options($filtros)
{
	$estudiantes[] = $escuelas[] = $areas[] = $especialidades[] = $options[0] = $options[1] = $options[2] = $options[3] = "";
	$j = 0;
	foreach ($filtros as $filtro) 
	{
		$estudiantes[$filtro['id']] = $filtro['estudiante'];
		$escuelas[$j] = $filtro['escuela'];
		$areas[$j] = $filtro['area'];
		$especialidades[$j] = $filtro['especialidad'];		
		$j++;
	}

	$estudiantes = array_unique($estudiantes);
	$escuelas = array_unique($escuelas );
	$areas = array_unique($areas);
	$especialidades = array_unique($especialidades);

	foreach($estudiantes as $key => $value)
	{		
		if($value != '')
		{
			$options[0].='<option value="'.$key.'" >'.$value.'</option>';
		}
	}

	foreach($escuelas as $key => $value)
	{		
		if($value != '')
		{
			$options[1].='<option value="'.$value.'" >'.$value.'</option>';
		}
	}

	foreach($areas as $key => $value)
	{		
		if($value != '')
		{
			$options[2].='<option value="'.$value.'" >'.$value.'</option>';
		}
	}

	foreach($especialidades as $key => $value)
	{		
		if($value != '')
		{
			$options[3].='<option value="'.$value.'" >'.$value.'</option>';
		}
	}
	return $options;
}

function fill_reporte($parametros)
{
	$complemento = "";
	if($parametros['stu'] != '0')
	{
		$complemento.= " AND e.id = ".$parametros['stu'];
	}

	if($parametros['esc'] != '0')
	{
		$complemento.= " AND t.escuela = '".$parametros['esc']."'";
	}	

	if($parametros['depe'] != '0')
	{
		$complemento.= " AND t.area = '".$parametros['depe']."'";
	}

	if($parametros['tipo'] != '')
	{
		$complemento.= " AND t.tipo = ".$parametros['tipo'];
	}

	if($parametros['espe'] != '0')
	{
		$complemento.= " AND t.especialidad = '".$parametros['espe']."'";
	}

	if($parametros['fi'] != '' AND $parametros['ff'] != '')
	{
		$complemento.= " AND t.fecha BETWEEN '".$parametros['fi']."' AND '".$parametros['ff']."'";
	}	

	if($parametros['fi'] != '' AND $parametros['ff'] == '')
	{
		$complemento.= " AND t.fecha >= '".$parametros['fi']."'";
	}	

	if($parametros['fi'] == '' AND $parametros['ff'] != '')
	{
		$complemento.= " AND t.fecha <= '".$parametros['ff']."'";
	}	
	$reportes = get_reporte($complemento);
	return $reportes;
}

function fill_tr_reporte($reportes)
{
	$tr_reporte[0] = $tr_reporte[1] = " "; $total = $presentacion = $aceptacion = $proceso = $liberacion = $cancelados = 0;

	foreach ($reportes as $reporte) 
	{
		$total++;
		if($reporte['status'] == 2)
		{
			$cancelados++;
		}else{
			switch ($reporte['etapa']) 
			{
				case 0:
					$presentacion++;
					break;

				case 1:
					$aceptacion++;
					break;
				
				case 2:
					$proceso++;
					break;

				case 3:
					$liberacion++;
					break;
				default:
					// code...
					break;
			}
		}
		if($reporte['tipo'] == 0)
		{
			$tipo = "Servicio";
		}else{
			$tipo = "Prácticas Profesionales";
		}

		$tr_reporte[1].='
						<tr>
								<td>'.$reporte['nombre'].' '.$reporte['paterno'].' '.$reporte['paterno'].'</td>
								<td>'.$reporte['escuela'].'</td>
								<td>'.$tipo.'</td>
								<td>'.$reporte['area'].'</td>
								<td><font COLOR="orange">'.$reporte['realizado'].'</font> de <font COLOR="#7ED16C">'.$reporte['horas'].'</font></td>
								<td class="hidden"></td>
								<td class="hidden"></td>
							</tr>
						';
	}

	$tr_reporte[0].='
					<div class="col-sm-2 infobox-container">
						<div class="infobox infobox-blue col-sm-4">
							<div class="infobox-icon">
								<i class="ace-icon fa fa-list"></i>
							</div>

							<div class="infobox-data">
								<span class="infobox-data-number">'.$total.'</span>
								<div class="infobox-content">Trámites Registrados</div>
							</div>
						</div>
					</div>

					<div class="col-sm-2 infobox-container">
						<div class="infobox infobox-purple col-sm-4">
							<div class="infobox-icon">
								<i class="ace-icon fa fa-file-text-o"></i>
							</div>

							<div class="infobox-data">
								<span class="infobox-data-number">'.$aceptacion.'</span>
								<div class="infobox-content">Carta de aceptación</div>
							</div>
						</div>
					</div>

					<div class="col-sm-2 infobox-container">
						<div class="infobox infobox-orange col-sm-4">
							<div class="infobox-icon">
								<i class="ace-icon fa fa-sliders"></i>
							</div>

							<div class="infobox-data">
								<span class="infobox-data-number">'.$proceso.'</span>
								<div class="infobox-content">En Proceso</div>
							</div>
						</div>
					</div>
					
					<div class="col-sm-2 infobox-container">
						<div class="infobox infobox-green col-sm-4">
							<div class="infobox-icon">
								<i class="ace-icon fa fa-check"></i>
							</div>

							<div class="infobox-data">
								<span class="infobox-data-number">'.$liberacion.'</span>
								<div class="infobox-content">Con carta de liberación</div>
							</div>
						</div>
					</div>

					<div class="col-sm-2 infobox-container">
						<div class="infobox infobox-red col-sm-4">
							<div class="infobox-icon">
								<i class="ace-icon fa fa-times"></i>
							</div>

							<div class="infobox-data">
								<span class="infobox-data-number">'.$cancelados.'</span>
								<div class="infobox-content">Cancelados/Rechazados</div>
							</div>
						</div>
					</div>

					';
	return $tr_reporte;
}