<?php
	include('../../model/tramites/fill.php');	
	include('../../controller/funciones.php');
	
	$tramite = fill_tramite_id($_POST['id']);
	$estudiante = fill_estudiante_id($tramite['id_estudiante']);
	$documentos = fill_documentos($_POST['id'], $tramite['id_estudiante']);
	$botones = "";
	$seteado="'".$tramite['area']."'";
	if($tramite['modalidad'] == 0)
	{
		$modalidad = "Semestral";
	}else{
		$modalidad = "Cuatrimestral";
	}
	
	if($tramite['tipo'] == 0)
	{
		$tipo = "Servicio Social";
	}else{
		$tipo = "Prácticas Profesionales";
	}

	if($tramite['discapacidad'] == 0)
	{
		$dis = "No";
	}else{
		$dis = "Sí";
	}
	if($_SESSION['id_tipo_usuario'] != 5)
	{
		if($tramite['status'] == 1 AND $tramite['etapa'] < 3 )
		{
			$botones = '<button type="button" class="btn btn-danger pull-rigth" data-dismiss="modal"  onclick="actualiza_status('.$_POST['id'].',0,0,0)"><i class="fa fa-times">&nbsp;</i>Cancelar trámite</button>
						';
		}
		if($tramite['status'] == 0 AND $tramite['etapa'] == 0)
		{
			$botones.= '<button type="button" class="btn btn-danger pull-rigth" data-dismiss="modal"  onclick="actualiza_status('.$_POST['id'].',0,0,0)"><i class="fa fa-times">&nbsp;</i>Rechazar</button>
						<button type="button" class="btn btn-success pull-rigth" data-dismiss="modal" onclick="actualiza_status('.$_POST['id'].',0,1,'.$seteado.')"><i class="fa fa-times">&nbsp;</i>Aprobar</button>
						';
		}
	}
?>
<link rel="stylesheet" type="text/css" href="./assets/css/files.css">
<link rel="stylesheet" type="text/css" href="./assets/fonts/tjm-icons/obligaciones/style.css">

<div id="modal_info" class="modal" tabindex="-1" style="overflow-y:auto;" data-backdrop="static">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<div class="widget-toolbar">
										
				</div>				
				<h1 class="blue">Servicio Social de <?=$estudiante['nombre'].' '.$estudiante['paterno'].' '.$estudiante['materno'];?></h1>				
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
						<div class="tabbable">				
							<ul id="inbox-tabs" class="nav nav-tabs padding-16 tab-size-bigger tab-space-1">
								<li class="active">
									<a data-toggle="tab" href="#datos">
										<i class="blue ace-icon fa fa-user bigger-130"></i>
										<span class="hid_spa">Datos Personales</span>
									</a>
								</li>

								<li>
									<a data-toggle="tab" href="#tramite">
										<i class="red ace-icon fa fa-book bigger-130"></i>
										<span class="hid_spa">Datos del trámite</span>
									</a>
								</li>

								<li>
									<a data-toggle="tab" href="#docs">
										<i class="green ace-icon fa fa-folder-open bigger-130"></i>
										<span class="hid_spa">Documentación</span>
									</a>
								</li>
							</ul>

							<div class="tab-content no-padding">		
								<div id="datos" class="tab-pane fade in active">
									<div class="message-container">
										<div id="id-message-list-navbar" class="message-navbar clearfix">											
											<div class="message-bar">
												<div class="message-infobar" id="id-message-infobar">
													<span style="display: block;" class="blue bigger-150">Datos Personales</span>
												</div>
											</div>
										</div>
										<div class="profile-user-info profile-user-info-striped">											
											<div class="profile-info-row">
												<div class="profile-info-name"> Nombre: </div>

												<div class="profile-info-value">
													<i class="fa fa-user blue bigger-110"></i>&nbsp;
													<?=$estudiante['nombre'].' '.$estudiante['paterno'].' '.$estudiante['materno'];?>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> CURP: </div>

												<div class="profile-info-value">
												<i class="fa fa-user blue bigger-110"></i>&nbsp;
													<?=$estudiante['curp'];?>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Dirección: </div>

												<div class="profile-info-value">
													<div style="display: flex;">
														<div style="align-self: center;">
															<i class="fa fa-map-marker blue bigger-110"></i>&nbsp;
															<?=$estudiante['calle'].' '.$estudiante['interior'].' '.$estudiante['exterior'].' '.$estudiante['colonia'].' '.$estudiante['cp'];?>
														</div>
													</div>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Fecha de nacimiento: </div>

												<div class="profile-info-value">
												<i class="fa fa-user blue bigger-110"></i>&nbsp;
													<?=$estudiante['fecha_nacimiento'];?>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Lugar de nacimiento: </div>

												<div class="profile-info-value">
												<i class="fa fa-user blue bigger-110"></i>&nbsp;
													<?=$estudiante['lugar_nacimiento'];?>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Teléfono: </div>

												<div class="profile-info-value">
												<i class="fa fa-phone blue bigger-110"></i>&nbsp;
													<?=$estudiante['telefono'];?>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Correo Electrónico: </div>

												<div class="profile-info-value">
												<i class="fa fa-envelope blue bigger-110"></i>&nbsp;
													<?=$estudiante['email'];?>
												</div>
											</div>											

											<div class="profile-info-row">
												<div class="profile-info-name"> Link a Facebook: </div>

												<div class="profile-info-value">
												<i class="fa fa-facebook blue bigger-110"></i>&nbsp;
													<a href="<?=$estudiante['facebook'];?>" target="_blank"><?=$estudiante['facebook'];?></a> 
												</div>
											</div>												
										</div>										
									</div>
								</div>

								<div id="tramite" class="tab-pane fade">
									<div class="message-container">
										<div id="id-message-list-navbar" class="message-navbar clearfix">
											<div class="message-bar">
												<div class="message-infobar" id="id-message-infobar">
													<span style="display: block;" class="blue bigger-150">Datos del Trámite</span>
												</div>
											</div>
										</div>		
										<div class="profile-user-info profile-user-info-striped">											
											<div class="profile-info-row">
												<div class="profile-info-name"> Escuela: </div>

												<div class="profile-info-value">
												<i class="fa fa-building red bigger-110"></i>&nbsp;
													<?=$tramite['escuela'];?>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Especialidad: </div>

												<div class="profile-info-value">
												<i class="fa fa-building red bigger-110"></i>&nbsp;
													<?=$tramite['especialidad'];?>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Modalidad: </div>

												<div class="profile-info-value">
												<i class="fa fa-building red bigger-110"></i>&nbsp;
													<?=$modalidad;?>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Tipo de trámite: </div>

												<div class="profile-info-value">
												<i class="fa fa-book red bigger-110"></i>&nbsp;
													<?=$tipo;?>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Horario: </div>

												<div class="profile-info-value">
												<i class="fa fa-clock-o red bigger-110"></i>&nbsp;
													<?=$tramite['horario'];?>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Horas a relizar: </div>

												<div class="profile-info-value">
												<i class="fa fa-clock-o red bigger-110"></i>&nbsp;
													<?=$tramite['horas'];?>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> ¿Tienes alguna enfermedad crónica o alergia?: </div>

												<div class="profile-info-value">
												<i class="fa fa-user red bigger-110"></i>&nbsp;
													<?=$dis.' | '.$tramite['cual'];?>
												</div>
											</div>											

											<div class="profile-info-row">
												<div class="profile-info-name"> Áreas de preferencia: </div>

												<div class="profile-info-value">
												<i class="fa fa-briefcase red bigger-110"></i>&nbsp;
													<?=$tramite['area'];?>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Observaciones: </div>

												<div class="profile-info-value">
												<i class="fa fa-comments-o red bigger-110"></i>&nbsp;
													<?=$tramite['observaciones'];?>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div id="docs" class="tab-pane fade">
									<div class="message-container">
										<div class="contenedor_flex" id="contenedor">
											<?=$documentos;?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>	

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary pull-left" data-dismiss="modal"><i class="fa fa-times">&nbsp;</i>Cerrar</button>			
				<?=$botones;?>
			</div>
		</div>	
	</div>
</div>