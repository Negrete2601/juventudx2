<?php
include('../../controller/tramites/funciones_tramites.php');

function fill_estudiantes_pendientes()
{
	$pendients = get_estudiantes_pendientes();
	return $pendients;
}

function fill_tr_estudiantes_pendientes($pendientes)
{
	$tr_pendientes='';
	foreach ($pendientes as $pendiente) 
	{
		$tr_pendientes.='
						<tr>
							<td>'.$pendiente['nombre'].' '.$pendiente['paterno'].' '.$pendiente['materno'].'</td>
							<td>'.$pendiente['curp'].'</td>
							<td>'.$pendiente['colonia'].' # '.$pendiente['exterior'].' - '.$pendiente['interior'].' '.$pendiente['colonia'].' '.$pendiente['cp'].'</td>
							<td>'.$pendiente['telefono'].'</td>
							<td>'.$pendiente['email'].'</td>
							<td><a href="'.$pendiente['facebook'].'" target="_blank">'.$pendiente['facebook'].'</a></td>
							<td class="center">
								<div class="btn-group">
									<a class="btn btn-xs btn-success" onclick="recha_acep('.$pendiente['id_usuario'].',1)" role="button" title="Aceptar Solicitud">
										<i class="ace-icon fa fa-check bigger-130"></i>
									</a>
									<a class="btn btn-xs btn-danger" onclick="recha_acep('.$pendiente['id_usuario'].',2)" role="button" title="Rechazar Solicitud">
										<i class="ace-icon fa fa-times bigger-130"></i>
									</a>
								</div>
							</td>
						</tr>																
						';
	}
	return $tr_pendientes;
}